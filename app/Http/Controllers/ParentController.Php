<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Eleve;

class ParentController extends Controller
{
    /**
     * Tableau de bord du parent connecté
     */
    public function dashboard()
    {
        return view('parent.dashboard');
    }

    /**
     * Afficher les notifications du parent
     */
    public function notifications()
    {
        $parent = Auth::user()->parentTuteur;
        if (!$parent) {
            return back()->with('error', 'Parent introuvable.');
        }

        // on récupère les 20 dernières notifications
        $notifications = $parent
            ->notifications()
            ->latest()
            ->take(20)
            ->get();

        return view('parent.notifications', compact('notifications'));
    }

    
    

    
    /**
     * Envoyer un message à l'administration
     */
    public function envoyerMessage(Request $request)
    {
        $request->validate([
            'objet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'user_id' => Auth::id(), // ou parent_tuteur_id selon ta table
            'objet' => $request->objet,
            'contenu' => $request->message,
        ]);

        return redirect()->route('parent.notifications')->with('success', 'Message envoyé avec succès.');
    }

    /**
     * Voir les enfants du parent connecté
     */
    public function enfants()
    {
        $eleves = Auth::user()->eleves()
            ->with(['inscriptions.classe.cycle', 'inscriptions.anneeScolaire'])
            ->get();
    
        return view('parent.enfants', compact('eleves'));
    }
    

    public function profil()
{
    $parent = Auth::user()->parentTuteur;

    return view('parent.profil', compact('parent'));
}

public function updateProfil(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'telephone' => 'nullable|string|max:20',
    ]);

    $parent = Auth::user()->parentTuteur;
    $parent->update($request->only(['nom', 'prenom', 'telephone']));

    return back()->with('success', '✅ Profil mis à jour avec succès.');
}


}
