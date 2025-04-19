@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Fiche d’inscription</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
    .header { text-align: center; margin-bottom: 20px; }
    .section { margin-bottom: 15px; }
    .label { font-weight: bold; width: 120px; display: inline-block; }
  </style>
</head>
<body>
  <div class="header">
    <h2>📄 Fiche d’inscription scolaire</h2>
    <p>Année : {{ $inscription->anneeScolaire->libelle }}</p>
  </div>

  <div class="section">
    <p><span class="label">Nom :</span> {{ $inscription->eleve->nom }}</p>
    <p><span class="label">Prénom :</span> {{ $inscription->eleve->prenom }}</p>
    <p><span class="label">Né(e) le :</span> {{ Carbon::parse($inscription->eleve->date_naissance)->format('d/m/Y') }}</p>
    <p><span class="label">Sexe :</span> {{ $inscription->eleve->sexe }}</p>
  </div>

  <div class="section">
    <p><span class="label">Cycle :</span> {{ $inscription->classe->cycle->nom }}</p>
    <p><span class="label">Classe :</span> {{ $inscription->classe->nom }}</p>
  </div>

  <div class="section">
    <p><span class="label">Parent :</span> {{ $inscription->eleve->parentTuteur->nom }}</p>
    <p><span class="label">Tél. :</span> {{ $inscription->eleve->parentTuteur->telephone }}</p>
    <p><span class="label">Email :</span> {{ $inscription->eleve->parentTuteur->email }}</p>
  </div>
</body>
</html>
