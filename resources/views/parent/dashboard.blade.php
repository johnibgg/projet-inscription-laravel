@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-blue-600 mb-4">Bienvenue, {{ Auth::user()->name ?? 'Parent' }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <a href="{{ route('inscription.create') }}" class="p-6 bg-blue-100 hover:bg-blue-200 rounded-xl shadow text-blue-800 font-semibold">
        ➕ Nouvelle inscription
      </a>
      <a href="{{ route('inscription.liste') }}" class="p-6 bg-green-100 hover:bg-green-200 rounded-xl shadow text-green-800 font-semibold">
        👨‍👧‍👦 Mes enfants inscrits
      </a>
      <a href="{{ route('parent.notifications') }}" class="p-6 bg-yellow-100 hover:bg-yellow-200 rounded-xl shadow text-yellow-800 font-semibold">
        🔔 Mes notifications
      </a>
      <form method="POST" action="{{ route('logout') }}" class="p-6 bg-red-100 hover:bg-red-200 rounded-xl shadow text-red-800 font-semibold">
        @csrf
        <button type="submit" class="w-full text-left">
          🚪 Déconnexion
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
