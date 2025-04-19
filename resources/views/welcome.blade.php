<!DOCTYPE html> 
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil | Plateforme Scolaire</title>
  <style>
    body {
      background-color: #ffffff;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      text-align: center;
      padding: 2rem;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: bold;
      color: #1d4ed8;
      margin-bottom: 1rem;
    }

    p {
      color: #4b5563;
      font-size: 1.125rem;
      margin-bottom: 2rem;
    }

    .btn {
      display: inline-block;
      padding: 0.5rem 1.5rem;
      font-size: 1rem;
      border-radius: 0.75rem;
      text-decoration: none;
      margin: 0 0.5rem;
    }

    .btn-primary {
      background-color: #2563eb;
      color: white;
    }

    .btn-primary:hover {
      background-color: #1d4ed8;
    }

    .btn-secondary {
      background-color: #e5e7eb;
      color: #1f2937;
    }

    .btn-secondary:hover {
      background-color: #d1d5db;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue sur la Plateforme d’Inscription Scolaire</h1>
    <p>Pour inscrire votre enfant dans une école primaire ou secondaire.</p>
    <div>
      <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
      <a href="{{ route('register') }}" class="btn btn-secondary">Créer un compte</a>
    </div>
  </div>
</body>
</html>
