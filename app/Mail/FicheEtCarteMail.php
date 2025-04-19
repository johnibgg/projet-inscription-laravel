<?php

namespace App\Mail;

use App\Models\Inscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FicheEtCarteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;

    public function __construct(Inscription $inscription)
    {
        $this->inscription = $inscription;
    }

    // app/Mail/FicheEtCarteMail.php

    public function build()
    {
        return $this->subject('📄 Fiche & Carte scolaire de votre enfant')
                    ->view('emails.fiche_et_carte');
    }
    
    

}
