<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InscriptionReussieNotification extends Notification
{
    use Queueable;

    public $eleve;

    public function __construct($eleve)
    {
        $this->eleve = $eleve;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => '✅ Votre enfant ' . $this->eleve->nom . ' ' . $this->eleve->prenom . ' a été inscrit avec succès.',
        ];
    }
}
