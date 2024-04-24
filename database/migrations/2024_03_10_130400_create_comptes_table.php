<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('typeCompte', ['epargne', 'courant']); // Utilisation d'un enum pour le type de compte
            $table->string('rib')->unique();
            $table->string('cin')->nullable(); // En supposant que le numéro CIN peut contenir des caractères alphabétiques
            $table->string('photo')->nullable(); // Utilisation d'une chaîne pour stocker le chemin de la photo
            $table->integer('solde');
            $table->enum('statut', ['actif', 'bloque', 'debloque']); // Utilisation d'un enum pour le statut
            $table->foreignId('pack_id')->constrained('packs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
