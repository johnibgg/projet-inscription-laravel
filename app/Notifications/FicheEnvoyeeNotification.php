<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class FicheEnvoyeeNotification extends Notification
{
    use Queueable;

    public $eleve;

    public $inscription;

public function __construct($inscription)
{
    $this->inscription = $inscription;
}


    public function via($notifiable)
    {
        return ['database'];
    }

   /* public function toArray($notifiable)
    {
        return [
            'message' => '📧 La fiche et la carte de ' . $this->eleve->nom . ' ' . $this->eleve->prenom . ' ont été envoyées par email.',
        ];
    }*/
    public function toDatabase($notifiable)
    {
        return [
            'message' => '📧 La fiche et la carte de ' 
                       . $this->inscription->eleve->prenom 
                       . ' ' . $this->inscription->eleve->nom 
                       . ' ont été envoyées par email.',
            'inscription_id' => $this->inscription->id,
        ];
    }
    


}
