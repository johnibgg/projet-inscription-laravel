@extends('layouts.app')

@section('title', 'Mes Enfants')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Liste des Enfants Inscrits</h1>

    @if($eleves->isEmpty())
        <p class="text-center text-gray-600">Aucun enfant inscrit pour ce parent.</p>
    @else
        <table class="min-w-full table-auto bg-gray-50 border border-gray-300 rounded-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Prénom</th>
                    <th class="px-4 py-2 text-left">Classe</th>
                    <th class="px-4 py-2 text-left">Année scolaire</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eleves as $eleve)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $eleve->nom }}</td>
                        <td class="px-4 py-2">{{ $eleve->prenom }}</td>
                        <td class="px-4 py-2">{{ $eleve->inscriptions->first()->classe->nom }}</td>
                        <td class="px-4 py-2">{{ $eleve->inscriptions->first()->anneeScolaire->libelle }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('inscription.fiche', $eleve->inscriptions->first()->id) }}" class="bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded-full text-sm">Voir Fiche</a>
                            <a href="{{ route('inscription.carte', $eleve->inscriptions->first()->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-full text-sm ml-2">Voir Carte</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
