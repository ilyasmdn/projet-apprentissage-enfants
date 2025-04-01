<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Spécifie les champs modifiables de la table
    protected $fillable = ['nom', 'email', 'mot_de_passe'];
}
