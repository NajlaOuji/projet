<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Module;
class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre_projet',
        'description',
        'document',
        'id_client',
        'id_chef',
        'date_debut',
        'date_fin',
        'taux_avancement',
        'etat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
