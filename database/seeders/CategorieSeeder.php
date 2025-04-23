<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nom' => 'Animaux',
                'description' => 'Découvrez différents types d\'animaux'
            ],
            [
                'nom' => 'Transport',
                'description' => 'Les différents moyens de transport'
            ],
            [
                'nom' => 'Couleurs',
                'description' => 'Apprenez les couleurs de base'
            ],
            [
                'nom' => 'Nombres',
                'description' => 'Les chiffres et les nombres de 1 à 10'
            ]
        ];

        foreach ($categories as $category) {
            Categorie::create($category);
        }
    }
}
