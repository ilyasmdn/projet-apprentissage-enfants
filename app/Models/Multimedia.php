<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';
    
    protected $fillable = [
        'type',
        'fichier',
        'chemin',
        'element_id'
    ];

    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function getCheminAttribute()
    {
        return $this->fichier;
    }
}