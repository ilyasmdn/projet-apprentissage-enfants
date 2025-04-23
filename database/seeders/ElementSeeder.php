<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    public function run(): void
    {
        $elementsParCategorie = [
            'Animaux' => [
                ['nom' => 'Chat', 'description' => 'Le chat est un animal domestique'],
                ['nom' => 'Chien', 'description' => 'Le chien est le meilleur ami de l\'homme'],
                ['nom' => 'Lion', 'description' => 'Le roi de la jungle'],
            ],
            'Transport' => [
                ['nom' => 'Voiture', 'description' => 'Un véhicule à quatre roues'],
                ['nom' => 'Train', 'description' => 'Un moyen de transport sur rails'],
                ['nom' => 'Avion', 'description' => 'Un véhicule qui vole dans le ciel'],
            ],
            'Couleurs' => [
                ['nom' => 'Rouge', 'description' => 'La couleur du feu'],
                ['nom' => 'Bleu', 'description' => 'La couleur du ciel'],
                ['nom' => 'Vert', 'description' => 'La couleur de l\'herbe'],
            ],
            'Nombres' => [
                ['nom' => 'Un', 'description' => 'Le chiffre 1'],
                ['nom' => 'Deux', 'description' => 'Le chiffre 2'],
                ['nom' => 'Trois', 'description' => 'Le chiffre 3'],
            ]
        ];

        foreach ($elementsParCategorie as $categorieName => $elements) {
            $categorie = Categorie::where('nom', $categorieName)->first();
            if ($categorie) {
                foreach ($elements as $element) {
                    $element['categorie_id'] = $categorie->id;
                    Element::create($element);
                }
            }
        }
    }
}
