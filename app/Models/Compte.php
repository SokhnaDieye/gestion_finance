<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'typeCompte', 'rib', 'cin', 'photo', 'solde', 'statut','pack_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

//    la deduction par mois
    protected $dates = ['derniereDeduction'];
}
