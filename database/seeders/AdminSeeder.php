<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nom' => 'Admin Principal',
            'email' => 'admin@example.com',
            'mot_de_passe' => Hash::make('password123')
        ]);

        Admin::create([
            'nom' => 'Admin Assistant',
            'email' => 'assistant@example.com',
            'mot_de_passe' => Hash::make('password123')
        ]);
    }
}
