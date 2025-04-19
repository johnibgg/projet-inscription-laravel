<?php
ini_set('memory_limit', '1024M');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ReinscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Accueil (Page d’accueil personnalisée avec bouton login/register)
Route::get('/', function () {
    return view('accueil');
})->name('home');

// Authentification Laravel Breeze (login/register/reset)
require __DIR__.'/auth.php';

// Tableau de bord parent
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/parent/enfants', [ParentController::class, 'enfants'])->name('enfants.index');
    Route::get('/parent/notifications', [ParentController::class, 'notifications'])->name('parent.notifications');
    Route::post('/parent/notifications/repondre', [ParentController::class, 'envoyerMessage'])->name('notifications.repondre');

    // Inscription
    Route::get('/inscription/create', [InscriptionController::class, 'create'])->name('inscription.create');
    Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');
    Route::get('/inscription/liste', [InscriptionController::class, 'index'])->name('inscription.liste');
    Route::get('/inscription/fiche/{id}', [InscriptionController::class, 'fiche'])->name('inscription.fiche');
    Route::get('/inscription/carte/{id}', [InscriptionController::class, 'carte'])->name('inscription.carte');
    Route::get('/inscription/reinscription/{id}', [InscriptionController::class, 'reinscription'])->name('inscription.reinscription');
    Route::post('/inscription/valider/{id}', [InscriptionController::class, 'validerEtEnvoyer'])->name('inscription.valider');

    // Réinscription (optionnel si tu as ReinscriptionController séparé)
    Route::get('/reinscription/{eleve}', [ReinscriptionController::class, 'showForm'])->name('reinscription.show');
    Route::post('/reinscription', [ReinscriptionController::class, 'store'])->name('reinscription.store');

    // Profil utilisateur (facultatif via Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


use App\Http\Controllers\AnneeScolaireController;

Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/annees', AnneeScolaireController::class)->names('annees');
    Route::patch('/admin/annees/{annee}/activer', [AnneeScolaireController::class, 'activer'])->name('annees.activer');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/parent/profil', [ParentController::class, 'profil'])->name('parent.profil');
    Route::put('/parent/profil', [ParentController::class, 'updateProfil'])->name('parent.profil.update');
});


use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Ceci est un test d’envoi Gmail avec Laravel.', function ($message) {
        $message->to('destinataire@gmail.com')
                ->subject('Test Laravel Gmail');
    });

    return '✅ Mail envoyé !';
});
