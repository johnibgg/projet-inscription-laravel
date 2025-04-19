@extends('layouts.app')

@section('title', 'Mes enfants')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-6">
  <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">👧 Mes enfants inscrits</h2>

  @if (session('success'))
    <div class="text-green-600 text-center font-medium mb-4">
      {{ session('success') }}
    </div>
  @endif

  @forelse ($eleves as $eleve)
    <div class="bg-gray-50 border rounded-xl p-4 mb-4 shadow-sm">
      <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $eleve->nom }} {{ $eleve->prenom }}</h3>
      <p><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d/m/Y') }}</p>
      <p><strong>Sexe :</strong> {{ $eleve->sexe }}</p>

      @if ($eleve->inscriptions->count())
        @php
          $derniere = $eleve->inscriptions->sortByDesc('created_at')->first();
        @endphp
        <p><strong>Classe actuelle :</strong> {{ $derniere->classe->nom }} ({{ $derniere->classe->cycle->nom }})</p>
        <p><strong>Année scolaire :</strong> {{ $derniere->anneeScolaire->libelle }}</p>

        <div class="mt-3 flex gap-3">
          <a href="{{ route('inscription.fiche', $derniere->id) }}" class="text-blue-600 hover:underline">📄 Voir fiche</a>
          <a href="{{ route('inscription.carte', $derniere->id) }}" class="text-green-600 hover:underline">🪪 Carte scolaire</a>
          <a href="{{ route('reinscription.show', $eleve->id) }}" class="text-indigo-600 hover:underline">🔁 Réinscription</a>
        </div>
      @else
        <p class="text-sm text-gray-500 italic">Aucune inscription enregistrée pour cet élève.</p>
      @endif
    </div>
  @empty
    <p class="text-center text-gray-500 italic">Aucun élève inscrit pour le moment.</p>
  @endforelse
</div>
@endsection
