@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold text-center text-blue-600 mb-6">👤 Profil du parent / tuteur</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('parent.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Nom</label>
            <input type="text" name="nom" value="{{ $parent->nom }}" class="input-style" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Prénom</label>
            <input type="text" name="prenom" value="{{ $parent->prenom }}" class="input-style">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Téléphone</label>
            <input type="text" name="telephone" value="{{ $parent->telephone }}" class="input-style">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl">
                💾 Enregistrer les modifications
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
@endsection
