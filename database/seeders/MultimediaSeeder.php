<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\Multimedia;
use Illuminate\Database\Seeder;

class MultimediaSeeder extends Seeder
{
    public function run(): void
    {
        // Exemple avec l'élément "Chat"
        $chat = Element::where('nom', 'Chat')->first();
        if ($chat) {
            Multimedia::create([
                'type' => 'image',
                'fichier' => 'uploads/chat.jpg',
                'element_id' => $chat->id
            ]);
            Multimedia::create([
                'type' => 'audio',
                'fichier' => 'uploads/chat.mp3',
                'element_id' => $chat->id
            ]);
        }

        // Exemple avec l'élément "Train"
        $train = Element::where('nom', 'Train')->first();
        if ($train) {
            Multimedia::create([
                'type' => 'image',
                'fichier' => 'uploads/train.jpg',
                'element_id' => $train->id
            ]);
            Multimedia::create([
                'type' => 'video',
                'fichier' => 'uploads/train.mp4',
                'element_id' => $train->id
            ]);
        }
    }
}
