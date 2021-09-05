<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_module',
        'titre_tache',
        'description',  
        'id_membre',
        'date_debut',
        'date_fin',
        'taux_avancement',
        'etat',
        
    ];
}
