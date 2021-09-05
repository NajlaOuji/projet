<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
class Module extends Model
{
    use HasFactory;
    protected $fillable =[
        'titre_module',
        'id_projet',
        'date_debut',
        'date_fin',
    ];

      public function projet()
      {
        return $this->belongsTo(Projet::class);
      }

}
