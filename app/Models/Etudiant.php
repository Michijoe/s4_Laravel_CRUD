<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'date_naissance',
        'ville_id',
    ];

    /**
     * Modèle lié pour récupérer le nom de la ville dans laquelle l'étudiant vit
     */
    public function etudiantHasVille()
    {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
}
