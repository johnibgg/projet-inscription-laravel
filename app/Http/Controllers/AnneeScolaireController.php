<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
    public function index()
    {
        $annees = AnneeScolaire::all();
        return view('admin.annees.index', compact('annees'));
    }

    public function create()
    {
        return view('admin.annees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|unique:annee_scolaires,libelle',
        ]);

        AnneeScolaire::create([
            'libelle' => $request->libelle,
            'active' => false,
        ]);

        return redirect()->route('annees.index')->with('success', 'Année scolaire ajoutée !');
    }

    public function activer(AnneeScolaire $annee)
    {
        AnneeScolaire::query()->update(['active' => false]); // désactive toutes les années
        $annee->update(['active' => true]); // active celle sélectionnée

        return redirect()->back()->with('success', "L'année {$annee->libelle} est maintenant active.");
    }
}
