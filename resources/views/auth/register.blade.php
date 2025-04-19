<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Créer un compte - Plateforme d'Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full">
    <h2 class="text-2xl font-bold text-blue-600 text-center mb-6">Créer un compte</h2>

    <!-- Formulaire de création de compte -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-medium text-gray-700">Nom complet</label>
        <input type="text" name="name" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded-xl hover:bg-blue-700 transition">Créer un compte</button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">Déjà inscrit ? 
      <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
    </p>
  </div>

</body>
</html>
