<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Connexion - Plateforme d'Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full">
    <h2 class="text-2xl font-bold text-blue-600 text-center mb-6">Se connecter</h2>

    <!-- Formulaire de connexion -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" required class="mt-1 w-full rounded-xl border-gray-300 shadow-sm">
      </div>

      <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded-xl hover:bg-blue-700 transition">Se connecter</button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">Pas encore de compte ? 
      <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Créer un compte</a>
    </p>
  </div>

</body>
</html>
