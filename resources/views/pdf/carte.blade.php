@extends('layouts.app')

@section('title', 'Carte scolaire')

@section('content')
<style>
  @media print {
    .no-print {
      display: none;
    }
  }
</style>

<div class="card bg-white rounded-xl shadow-lg max-w-md mx-auto mt-8 p-6 text-sm">
  <!-- En-tête -->
  <div class="flex justify-between items-center mb-6">
    <div class="flex gap-4 items-center">
      <img src="{{ asset('images/logo_ecole.png') }}" alt="Logo École" class="h-12">
      <div>
        <h1 class="text-xl font-bold text-blue-600">Carte de Scolarité</h1>
        <p class="text-gray-600">Année {{ $inscription->anneeScolaire->libelle }}</p>
      </div>
    </div>
    <img src="{{ asset('storage/' . ($inscription->eleve->photo ?? 'photos/default.png')) }}"
     class="h-20 w-16 object-cover border rounded"
     alt="Photo élève">


  </div>

  <!-- Informations élève -->
  <div class="space-y-2 text-gray-700">
    <p><strong>Nom :</strong> {{ $inscription->eleve->nom }}</p>
    <p><strong>Prénom :</strong> {{ $inscription->eleve->prenom }}</p>
    <p><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($inscription->eleve->date_naissance)->format('d/m/Y') }}</p>

    <p><strong>Sexe :</strong> {{ $inscription->eleve->sexe }}</p>
    <p><strong>Cycle :</strong> {{ $inscription->classe->cycle->nom }}</p>
    <p><strong>Classe :</strong> {{ $inscription->classe->nom }}</p>
    <p><strong>Matricule :</strong> {{ $inscription->eleve->matricule }}</p>
  </div>

  <!-- Pied -->
  <div class="mt-6 text-center text-xs text-gray-500 border-t pt-4">
    École Les Étoiles du Savoir <br>
    Adresse : Calavi, Bénin — Tél : +229 01 51 46 45 10
  </div>

  <!-- Boutons -->
<div class="flex justify-between mt-6 no-print">
  <button onclick="window.print()" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">🖨️ Imprimer</button>
  <a href="{{ route('inscription.liste') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">↩️ Retour</a>
</div>
</div>
@endsection
