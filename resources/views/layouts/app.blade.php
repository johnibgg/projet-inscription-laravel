<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Plateforme d’Inscription Scolaire')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- 🔵 Barre de navigation -->
  <header class="bg-blue-600 text-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-lg font-bold">Plateforme d’Inscription</h1>
      @auth
      <nav>
        <ul class="flex space-x-4 text-sm md:text-base">
          <li><a href="{{ route('parent.dashboard') }}" class="hover:underline">Accueil</a></li>
          <li><a href="{{ route('inscription.create') }}" class="hover:underline">Nouvelle inscription</a></li>
          <li> <a href="{{ route('parent.profil') }}" class=" hover:underline">👤 Mon profil</a>
          </li>
          <li><a href="{{ route('inscription.liste') }}" class="hover:underline">Enfants</a></li>
          <li><a href="{{ route('parent.notifications') }}" class="hover:underline">Notifications</a></li>

          <li>
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="hover:underline">Déconnexion</button>
            </form>
          </li>
        </ul>
      </nav>
      @endauth
    </div>
  </header>

  <!-- 🟢 Contenu principal -->
  <main class="flex-grow p-6">
    @yield('content')
  </main>

  <!-- ⚫ Pied de page -->
  <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
    &copy; {{ date('Y') }} Plateforme d’Inscription. Tous droits réservés.
  </footer>

</body>
</html>
