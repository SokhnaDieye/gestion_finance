<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauCompteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compte;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($compte)
    {
        $this->compte = $compte;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nouveauCompte')
            ->subject('Bienvenue sur notre plateforme bancaire');
    }
}
