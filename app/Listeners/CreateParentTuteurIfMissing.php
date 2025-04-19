<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\ParentTuteur;

class CreateParentTuteurIfMissing
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        if (!$user->parentTuteur) {
            ParentTuteur::create([
                'user_id' => $user->id,
                'nom' => $user->name,
                'prenom' => 'Parent', // valeur par défaut si pas de champ prénom
                'email' => $user->email,
                'telephone' => '0100000000', // ou récupère dans un formulaire
                'password' => bcrypt('parent123'), // mot de passe temporaire
            ]);
        }
    }
}
