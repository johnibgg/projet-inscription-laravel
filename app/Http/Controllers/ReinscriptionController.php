<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Inscription;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;
use App\Notifications\ReinscriptionReussieNotification;



class ReinscriptionController extends Controller
{
    public function showForm($id)
{
    $eleve = Eleve::findOrFail($id);
    $cycles = Cycle::with('classes')->get();
    $annees = AnneeScolaire::all();

    // ✅ Cette version renvoie un tableau de type : [cycle_id => [classe_id => nom]]
    $classesParCycle = $cycles->mapWithKeys(function ($cycle) {
        return [
            $cycle->id => $cycle->classes->mapWithKeys(function ($classe) {
                return [$classe->id => $classe->nom];
            })
        ];
    });

    $inscription = $eleve->inscriptions()->latest()->first();

    return view('inscription.reinscription', compact(
        'eleve',
        'inscription',
        'cycles',
        'annees',
        'classesParCycle'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'classe_id' => 'required|exists:classes,id',
            'annee_scolaire_libelle' => 'required|string|max:20',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:M,F',
        ]);

        $eleve = Eleve::findOrFail($request->eleve_id);
        $eleve->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
        ]);

        $annee = AnneeScolaire::firstOrCreate(
            ['libelle' => $request->annee_scolaire_libelle],
            ['active' => false]
        );

        $inscription = Inscription::create([
            'eleve_id' => $eleve->id,
            'classe_id' => $request->classe_id,
            'annee_scolaire_id' => $annee->id,
        ]);
        $eleve->parentTuteur->notify(new ReinscriptionReussieNotification($eleve));




        return redirect()->route('inscription.fiche', $inscription->id)
            ->with('success', '✅ Réinscription réussie !');
    }
}
