<style>
  body { font-family: sans-serif; font-size: 11px; }
  .card { border: 1px solid #888; padding: 10px; width: 180px; }
  .title { text-align: center; font-weight: bold; margin-bottom: 8px; }
  .field { margin-bottom: 4px; }
  .label { font-weight: bold; }
</style>

<div class="card">
  <div class="title">Carte de Scolarité</div>
  <div class="field"><span class="label">Nom :</span> {{ $inscription->eleve->nom }}</div>
  <div class="field"><span class="label">Prénom :</span> {{ $inscription->eleve->prenom }}</div>
  <div class="field"><span class="label">Né(e) :</span> {{ Carbon\Carbon::parse($inscription->eleve->date_naissance)->format('d/m/Y') }}</div>
  <div class="field"><span class="label">Classe :</span> {{ $inscription->classe->nom }}</div>
  <div class="field"><span class="label">Matricule :</span> {{ $inscription->eleve->matricule }}</div>
</div>
