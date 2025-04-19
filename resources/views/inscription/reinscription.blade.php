@extends('layouts.app')

@section('title', 'Réinscription')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-lg mt-6">
  <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">✍️ Réinscription d’un Élève</h2>

  @if (session('success'))
    <div class="text-green-600 font-medium text-center mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('reinscription.store') }}">
    @csrf

    <input type="hidden" name="eleve_id" value="{{ $eleve->id }}">

    <!-- Élève -->
    <div class="grid md:grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" name="nom" class="input-style" value="{{ old('nom', $eleve->nom) }}">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" name="prenom" class="input-style" value="{{ old('prenom', $eleve->prenom) }}">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Date de naissance</label>
        <input type="date" name="date_naissance" class="input-style" value="{{ old('date_naissance', $eleve->date_naissance) }}">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Sexe</label>
        <select name="sexe" class="input-style">
          <option value="M" @selected(old('sexe', $eleve->sexe) === 'M')>Masculin</option>
          <option value="F" @selected(old('sexe', $eleve->sexe) === 'F')>Féminin</option>
        </select>
      </div>
    </div>

    <!-- Nouvelle inscription -->
    <h3 class="text-lg font-semibold text-gray-800 mt-6 mb-2">🎓 Nouvelle inscription</h3>

    <div class="grid md:grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Cycle</label>
        <select name="cycle_id" id="cycleSelect" class="input-style" required>
          @foreach ($cycles as $cycle)
            <option value="{{ $cycle->id }}">{{ $cycle->nom }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Classe</label>
        <select name="classe_id" id="classeSelect" class="input-style" required>
          <option value="">Sélectionner une classe</option>
        </select>
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Année scolaire</label>
        <input type="text" name="annee_scolaire_libelle" class="input-style" placeholder="Ex: 2024-2025" required>
      </div>
    </div>

    <div class="text-center mt-6">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl">
        🔁 Confirmer la réinscription
      </button>
    </div>
  </form>
</div>

<style>
  .input-style {
    width: 100%;
    padding: 0.5rem;
    margin-top: 0.25rem;
    border: 1px solid #d1d5db;
    border-radius: 0.75rem;
    background-color: #f9fafb;
    font-size: 1rem;
  }
</style>

<script>
  const classesParCycle = @json($classesParCycle);
  const cycleSelect = document.getElementById('cycleSelect');
  const classeSelect = document.getElementById('classeSelect');

  cycleSelect.addEventListener('change', function () {
    const classes = classesParCycle[this.value] || {};
    classeSelect.innerHTML = '<option value="">Sélectionner une classe</option>';

    // ✅ On affiche bien les noms des classes
    Object.entries(classes).forEach(([id, data]) => {
      const option = document.createElement('option');
      option.value = data.id ?? id;   // pour couvrir les deux cas
      option.textContent = data.nom ?? data; // si data est juste un nom ou un objet
      classeSelect.appendChild(option);
    });
  });
</script>



@endsection
