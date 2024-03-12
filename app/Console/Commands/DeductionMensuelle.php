<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DeductionMensuelle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deduction-mensuelle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $comptes = Compte::all();

        foreach ($comptes as $compte) {
            $pack = $compte->pack;

            if ($pack->nom == 'standard' || $pack->nom == 'premium' || $pack->nom == 'gold') {
                $montantDeduction = ($pack->nom == 'standard') ? 5000 : (($pack->nom == 'premium') ? 10000 : 15000);
                $now = Carbon::now();

                // Vérifier si 30 jours se sont écoulés depuis la dernière déduction
                if ($compte->derniereDeduction == null || $now->diffInDays($compte->derniereDeduction) >= 30) {
                    $compte->derniereDeduction = $now;
                    $compte->solde -= $montantDeduction;
                    $compte->save();
                }
            }
        }
    }
}
