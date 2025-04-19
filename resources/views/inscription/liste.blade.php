@extends('layouts.app')

@section('title', 'Liste des inscriptions')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-lg mt-6">
  <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">🧾 Liste complète des inscriptions</h2>

  @if (session('success'))
    <div class="text-green-600 text-center font-medium mb-4">
      {{ session('success') }}
    </div>
  @endif

  @forelse ($eleves as $eleve)
    <div class="bg-gray-50 border rounded-xl p-4 mb-6 shadow-sm">
      <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $eleve->nom }} {{ $eleve->prenom }}</h3>
      <p><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($eleve->date_naissance)->format('d/m/Y') }}</p>
      <p><strong>Sexe :</strong> {{ $eleve->sexe }}</p>

      @if ($eleve->inscriptions->count())
        <div class="mt-4">
          <h4 class="text-sm font-bold text-gray-600 mb-2">🗂️ Historique des inscriptions :</h4>
          @foreach ($eleve->inscriptions->sortByDesc('created_at') as $inscription)
            <div class="bg-white border rounded p-3 mb-3">
              <p><strong>Classe :</strong> {{ $inscription->classe->nom }} ({{ $inscription->classe->cycle->nom }})</p>
              <p><strong>Année scolaire :</strong> {{ $inscription->anneeScolaire->libelle }}</p>
              <div class="mt-2 flex gap-3 flex-wrap">
                <a href="{{ route('inscription.fiche', $inscription->id) }}" class="text-blue-600 hover:underline">📄 Voir fiche</a>
                <a href="{{ route('inscription.carte', $inscription->id) }}" class="text-green-600 hover:underline">🪪 Carte scolaire</a>
                <form action="{{ route('inscription.valider', $inscription->id) }}" method="POST">
                  @csrf
                  <button type="submit" onclick="return confirm('Envoyer la fiche + carte par email ?')" class="text-indigo-600 hover:underline">📧 Envoyer par mail</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
        <a href="{{ route('reinscription.show', $eleve->id) }}" class="inline-block mt-2 text-indigo-600 hover:underline">🔁 Réinscrire cet élève</a>
      @else
        <p class="text-sm text-gray-500 italic">Aucune inscription enregistrée pour cet élève.</p>
      @endif
    </div>
  @empty
    <p class="text-center text-gray-500 italic">Aucun élève inscrit pour le moment.</p>
  @endforelse
</div>
@endsection
