<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    private array $mimeTypes = [
        'image' => [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        ],
        'audio' => [
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/wav'
        ],
        'video' => [
            'mp4' => 'video/mp4',
            'mov' => 'video/quicktime',
            'avi' => 'video/x-msvideo'
        ]
    ];

    public function show(Multimedia $multimedia)
    {
        abort_if(!Storage::disk('private')->exists($multimedia->fichier), 404);
        
        $extension = strtolower(pathinfo($multimedia->fichier, PATHINFO_EXTENSION));
        $mime = $this->mimeTypes[$multimedia->type][$extension] ?? 'application/octet-stream';
        
        $headers = [
            'Content-Type' => $mime,
            'Cache-Control' => 'public, max-age=3600',
            'Accept-Ranges' => 'bytes'
        ];
        
        return Storage::disk('private')->response($multimedia->fichier, null, $headers);
    }
}