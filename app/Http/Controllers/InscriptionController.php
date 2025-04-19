<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\FicheEtCarteMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Inscription;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ParentTuteur;
use Intervention\Image\Facades\Image;
use App\Notifications\InscriptionReussieNotification;
use App\Notifications\FicheEnvoyeeNotification;



class InscriptionController extends Controller
{
    public function create()
    {
        $cycles = Cycle::with('classes')->get();
        $annees = AnneeScolaire::where('active', true)->get();

        $classesParCycle = $cycles->mapWithKeys(function ($cycle) {
            return [$cycle->id => $cycle->classes->map(function ($classe) {
                return [
                    'id' => $classe->id,
                    'nom' => $classe->nom,
                ];
            })];
        });

        return view('inscription.formulaire', compact('cycles', 'annees', 'classesParCycle'));
    }

    public function store(Request $request)
    {
        // 1️⃣ Validation
        $request->validate([
            'nom'                     => 'required|string|max:255',
            'prenom'                  => 'required|string|max:255',
            'date_naissance'          => 'required|date',
            'sexe'                    => 'required|in:M,F',
            'classe_id'               => 'required|exists:classes,id',
            'annee_scolaire_libelle'  => 'required|string|max:20',
            'photo'                   => 'nullable|image|max:2048',
        ]);

        // 2️⃣ Gestion du upload + redimensionnement
        $photoPath = null;
        

// ...

if ($request->hasFile('photo')) {
    $image = $request->file('photo');
    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

    // Redimensionnement à 300x400
    $resized = Image::make($image)->fit(300, 400);
    $resized->save(storage_path('app/public/photos/' . $filename));

    $photoPath = 'photos/' . $filename;
}


        // 3️⃣ Création ou récupération de l’année scolaire
        $annee = AnneeScolaire::firstOrCreate(
            ['libelle' => $request->annee_scolaire_libelle],
            ['active'  => false]
        );

        // 4️⃣ Génération d’un matricule unique
        do {
            $matricule = strtoupper(substr($request->prenom, 0, 1) . substr($request->nom, 0, 1))
                       . '-' . rand(1000, 9999);
        } while (Eleve::where('matricule', $matricule)->exists());

        // 5️⃣ Vérification du parent/tuteur lié au user
        $parentTuteur = Auth::user()->parentTuteur;

          if (!$parentTuteur) {
          return back()->with('error', '❌ Aucun parent associé à ce compte.');
}


        // 6️⃣ Création de l’élève
        $eleve = Eleve::create([
            'nom'              => $request->nom,
            'prenom'           => $request->prenom,
            'date_naissance'   => $request->date_naissance,
            'sexe'             => $request->sexe,
            'photo'            => $photoPath,
            'matricule'        => $matricule,
            'parent_tuteur_id' => $parentTuteur->id,
        ]);

        // 7️⃣ Création de l’inscription
        $inscription = Inscription::create([
            'eleve_id'          => $eleve->id,
            'classe_id'         => $request->classe_id,
            'annee_scolaire_id' => $annee->id,
        ]);


        $parentTuteur->notify(new InscriptionReussieNotification($eleve));


        // 8️⃣ Redirection vers la fiche générée
        return redirect()
            ->route('inscription.fiche', $inscription->id)
            ->with('success', '✅ Inscription réussie ! Voici la fiche de l’élève.');
    }

    public function index()
    {
        $eleves = Auth::user()->eleves()->with('inscriptions.classe.cycle', 'inscriptions.anneeScolaire')->get();
        return view('inscription.liste', compact('eleves'));
    }

    public function fiche($id)
    {
        $inscription = Inscription::with('eleve.parentTuteur', 'classe.cycle', 'anneeScolaire')->findOrFail($id);
        return view('inscription.fiche', compact('inscription'));
    }

    public function carte($id)
    {
        $inscription = Inscription::with('eleve', 'classe.cycle', 'anneeScolaire')->findOrFail($id);
        return view('inscription.carte', compact('inscription'));
    }

    public function reinscription($id)
{
    $inscription = Inscription::with('eleve')->findOrFail($id);
    $classes = Classe::all();
    $annees = AnneeScolaire::all();
    $cycles = Cycle::with('classes')->get();

    $classesParCycle = $cycles->mapWithKeys(function ($cycle) {
        return [$cycle->id => $cycle->classes->map(function ($classe) {
            return [
                'id' => $classe->id,
                'nom' => $classe->nom,
            ];
        })];
    });

    return view('inscription.reinscription', [
        'inscription' => $inscription,
        'eleve' => $inscription->eleve,
        'classes' => $classes,
        'annees' => $annees,
        'cycles' => $cycles,
        'classesParCycle' => $classesParCycle,
    ]);
    
}

    
    

public function validerEtEnvoyer($id)
{
    /*set_time_limit(120);
    ini_set('memory_limit', '512M');*/

    $inscription = Inscription::with('eleve.parentTuteur', 'classe.cycle', 'anneeScolaire')->findOrFail($id);
    $parent = $inscription->eleve->parentTuteur;

    if (!$parent || !$parent->email) {
        return back()->with('error', '❌ Adresse email du parent introuvable.');
    }

    // Générer les PDF à partir des vues
    $fichePdf = Pdf::loadView('pdf.fiche_light', compact('inscription'))->output();
    $cartePdf = Pdf::loadView('pdf.carte_light', compact('inscription'))->output();

  //  file_put_contents(public_path('fiche_test.pdf'), $fichePdf);
//file_put_contents(public_path('carte_test.pdf'), $cartePdf);


    // Envoyer l’email avec les PDF en pièces jointes
    Mail::to($parent->email)->send(
        (new FicheEtCarteMail($inscription))
            ->attachData($fichePdf, 'fiche_light.pdf')
            ->attachData($cartePdf, 'carte_light.pdf')
    );

    // Notification dans le dashboard
    $parent->notify(new FicheEnvoyeeNotification($inscription));

    return back()->with('success', '📧 Fiche & carte envoyées avec succès par email.');
}
}






