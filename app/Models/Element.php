<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    // Spécifie les champs modifiables de la table
    protected $fillable = ['nom', 'description', 'categorie_id'];

    // Définir la relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Définir la relation avec les fichiers multimédias
    public function multimedias()
    {
        return $this->hasMany(Multimedia::class);
    }
}
