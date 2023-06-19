<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    use HasFactory;

    protected $fillable = [ // est necessaire pour permettre le store dans le controller
        'ville_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
        // return $this->belongsTo(User::class);
    }

    public function ville() // Me permet d'aller chercher le nom de la ville associer a ville_id dans la table etudiant
    {
        return $this->belongsTo(Villes::class);
    }
}
