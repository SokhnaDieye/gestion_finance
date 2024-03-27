<?php

namespace App\Mail;

use App\Models\Compte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionEffectueeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compte;
    public $montant;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Compte $compte, $montant, $type)
    {
        $this->compte = $compte;
        $this->montant = $montant;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = ($this->type == 'debit') ? 'Confirmation de transaction - Débit' : 'Confirmation de transaction - Crédit';

        return $this->view('emails.transactionEffectuee')
            ->subject($subject);
    }
}
