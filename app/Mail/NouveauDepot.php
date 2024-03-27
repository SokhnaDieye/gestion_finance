<?php

namespace App\Mail;

use App\Models\Compte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauDepot extends Mailable
{
    use Queueable, SerializesModels;

    public $compte;
    public $montant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Compte $compte, $montant)
    {
        $this->compte = $compte;
        $this->montant = $montant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nouveauDepot')
            ->subject('Notification de dépôt sur votre compte')
            ->with([
                'compte' => $this->compte,
                'montant' => $this->montant,
            ]);
    }
}
