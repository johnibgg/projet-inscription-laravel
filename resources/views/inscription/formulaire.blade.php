@extends('layouts.app')

@section('title', 'Nouvelle inscription')

@section('content')
<div class="form-wrapper max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
  <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">📝 Inscription d’un Élève</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm">
      {{ session('error') }}
    </div>
  @endif

  <!-- ✅ Formulaire sécurisé -->
  <form method="POST" action="{{ route('inscription.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nom</label>
        <input type="text" name="nom" class="input-style" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Prénom</label>
        <input type="text" name="prenom" class="input-style" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Date de naissance</label>
        <input type="date" name="date_naissance" class="input-style" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Sexe</label>
        <select name="sexe" class="input-style" required>
          <option value="M">Masculin</option>
          <option value="F">Féminin</option>
        </select>
      </div>
    </div>

    <div class="mt-4">
      <label class="block font-medium text-sm text-gray-700">Photo de l'élève</label>
      <input type="file" name="photo" accept="image/*" class="input-style" required>
    </div>

    <div class="grid md:grid-cols-2 gap-4 mt-4">
      <div>
        <label class="block font-medium text-sm text-gray-700">Cycle</label>
        <select name="cycle_id" id="cycleSelect" class="input-style" required>
          <option value="">Sélectionner un cycle</option>
          @foreach ($cycles as $cycle)
            <option value="{{ $cycle->id }}">{{ $cycle->nom }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block font-medium text-sm text-gray-700">Classe</label>
        <select name="classe_id" id="classeSelect" class="input-style" required>
          <option value="">Sélectionner une classe</option>
        </select>
      </div>
    </div>

    <div class="mt-4">
      <label class="block font-medium text-sm text-gray-700">Année scolaire <span class="text-gray-400">(ex : 2024–2025)</span></label>
      <input type="text" name="annee_scolaire_libelle" placeholder="ex : 2024–2025" class="input-style" required>
    </div>

    <div class="text-center mt-6">
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl">
        ✅ Enregistrer l’inscription
      </button>
    </div>
  </form>
</div>

<!-- Style -->
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

<!-- JS dynamique -->
<script>
const classesParCycle = @json($classesParCycle);
const cycleSelect = document.getElementById('cycleSelect');
const classeSelect = document.getElementById('classeSelect');

cycleSelect.addEventListener('change', function () {
  const cycleId = this.value;
  const classes = classesParCycle[cycleId] || [];
  classeSelect.innerHTML = '<option value="">Sélectionner une classe</option>';
  classes.forEach(classe => {
    const option = document.createElement('option');
    option.value = classe.id;
    option.textContent = classe.nom;
    classeSelect.appendChild(option);
  });
});
</script>
@endsection
