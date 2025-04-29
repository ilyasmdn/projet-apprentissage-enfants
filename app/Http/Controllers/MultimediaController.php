<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Categorie;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    private function determineFileType($file)
    {
        $mimeType = $file->getMimeType();
        if (strstr($mimeType, 'image/')) return 'image';
        if (strstr($mimeType, 'audio/')) return 'audio';
        if (strstr($mimeType, 'video/')) return 'video';
        return 'image';
    }

    public function store(Request $request, $elementId)
    {
        $request->validate([
            'fichier' => 'required|file|mimes:jpeg,png,jpg,gif,mp3,wav,mp4,mov,avi|max:10240',
        ]);

        $element = Element::findOrFail($elementId);
        $filePath = $request->file('fichier')->store('uploads', 'private');

        $element->multimedias()->create([
            'type' => $this->determineFileType($request->file('fichier')),
            'fichier' => $filePath,
        ]);

        return redirect()->route('multimedias.index', $elementId);
    }

    public function destroy(Multimedia $multimedia)
    {
        if ($multimedia->fichier && Storage::disk('private')->exists($multimedia->fichier)) {
            Storage::disk('private')->delete($multimedia->fichier);
        }
        
        $element = $multimedia->element;
        $category = $element->categorie;
        
        $multimedia->delete();

        return redirect()->route('elements.edit', [$category, $element])
            ->with('success', 'Fichier supprimé avec succès');
    }
}
