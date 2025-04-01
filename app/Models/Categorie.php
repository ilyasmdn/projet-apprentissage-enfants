<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Spécifie les champs modifiables de la table
    protected $fillable = ['nom', 'description'];

    // Définir la relation avec les éléments
    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
