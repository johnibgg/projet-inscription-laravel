<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ReinscriptionReussieNotification extends Notification
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
            'message' => '🔁 Réinscription réussie pour ' . $this->eleve->nom . ' ' . $this->eleve->prenom . '.',
        ];
    }
}
