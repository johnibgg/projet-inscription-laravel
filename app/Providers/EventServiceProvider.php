<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use App\Models\ParentTuteur;
use Illuminate\Auth\Listeners\CreateParentTuteurIfMissing; // N'oublie pas d'ajouter le bon namespace


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\CreateParentTuteurIfMissing::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Écoute l'événement de login
        Event::listen(Login::class, function ($event) {
            // Vérifie si l'utilisateur a déjà un parent_tuteur
            if (!$event->user->parentTuteur) {
                // Si non, crée un parent_tuteur avec les informations de l'utilisateur
                ParentTuteur::create([
                    'user_id' => $event->user->id,
                    'nom' => $event->user->name,
                    'email' => $event->user->email,
                    'telephone' => '', // Laisse vide ou un numéro par défaut
                    'prenom' => '',    // Laisse vide ou récupère le prénom si tu veux
                    'password' => null, // Tu n'en as pas besoin, mais si c'est obligatoire, tu peux mettre une valeur par défaut
                ]);
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
