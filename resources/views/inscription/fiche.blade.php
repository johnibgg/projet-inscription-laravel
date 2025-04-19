@extends('layouts.app')

@section('title', 'Fiche d’inscription')

@section('content')
<style>
  @media print {
    .no-print {
      display: none;
    }
  }
  .section-title {
    font-weight: bold;
    color: #4B5563;
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 1.1rem;
  }
  input {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    background-color: #f9fafb;
  }
</style>

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg">
  <h1 class="text-2xl font-bold text-center text-blue-600 mb-1">📄 Fiche d’inscription scolaire</h1>
  <p class="text-center text-sm text-gray-500 mb-6">Année scolaire : {{ $inscription->anneeScolaire->libelle }}</p>

  <!-- Élève -->
  <h2 class="section-title">👧 Informations de l’élève</h2>
  <div class="grid md:grid-cols-2 gap-4 mb-4">
    <div><label>Nom :</label><input type="text" value="{{ $inscription->eleve->nom }}" readonly></div>
    <div><label>Prénom :</label><input type="text" value="{{ $inscription->eleve->prenom }}" readonly></div>
    <div><label>Date de naissance :</label> <input type="text" value="{{ \Carbon\Carbon::parse($inscription->eleve->date_naissance)->format('d/m/Y') }}" readonly></div>
    <div><label>Sexe :</label><input type="text" value="{{ $inscription->eleve->sexe }}" readonly></div>
  </div>

  <!-- Scolarité -->
  <h2 class="section-title">🏫 Informations scolaires</h2>
  <div class="grid md:grid-cols-2 gap-4 mb-4">
    <div><label>Cycle :</label><input type="text" value="{{ $inscription->classe->cycle->nom }}" readonly></div>
    <div><label>Classe :</label><input type="text" value="{{ $inscription->classe->nom }}" readonly></div>
    <div class="md:col-span-2"><label>Année scolaire :</label><input type="text" value="{{ $inscription->anneeScolaire->libelle }}" readonly></div>
  </div>

  <!-- Parent -->
  <h2 class="section-title">👨‍👧‍👦 Parent / Tuteur</h2>
  <div class="grid md:grid-cols-2 gap-4 mb-4">
    <div><label>Nom du parent :</label><input type="text" value="{{ $inscription->eleve->parent->nom }}" readonly></div>
    <div><label>Téléphone :</label><input type="text" value="{{ $inscription->eleve->parent->telephone }}" readonly></div>
    <div class="md:col-span-2"><label>Adresse email :</label><input type="text" value="{{ $inscription->eleve->parent->email }}" readonly></div>
  </div>

  <!-- Boutons -->
<div class="text-center no-print mt-6 space-x-4">
  <form action="{{ route('inscription.valider', $inscription->id) }}" method="POST" style="display:inline-block;">
    @csrf
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
      ✅ Envoyer fiche & carte
    </button>
  </form>
  <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
    🖨️ Imprimer
  </button>
  <a href="{{ route('inscription.liste') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
    ↩️ Retour
  </a>
</div>

@endsection
