<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'categorie_id'];

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function multimedias()
    {
        return $this->hasMany(Multimedia::class);
    }
}
