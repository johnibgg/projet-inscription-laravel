<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche et Carte Scolaire</title>
</head>
<body>
    <p>Bonjour {{ $inscription->eleve->parentTuteur->nom }},</p>

    <p>
        La fiche d'inscription et la carte scolaire de votre enfant <strong>{{ $inscription->eleve->prenom }} {{ $inscription->eleve->nom }}</strong> ont été générées avec succès.
    </p>

    <p>📎 Elles sont jointes à ce mail en format PDF.</p>

    <p>Merci pour votre confiance.</p>

    <p><strong>Plateforme d’Inscription Scolaire</strong></p>
</body>
</html>
