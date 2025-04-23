<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
