<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    public function index($elementId)
    {
        $element = Element::findOrFail($elementId);
        $multimedias = $element->multimedias;
        return view('multimedias.index', compact('multimedias', 'element'));
    }

    public function create($elementId)
    {
        $element = Element::findOrFail($elementId);
        return view('multimedias.create', compact('element'));
    }

    public function store(Request $request, $elementId)
    {
        $request->validate([
            'type' => 'required|in:image,video,audio',
            'fichier' => 'required|file',
        ]);

        $element = Element::findOrFail($elementId);
        $filePath = $request->file('fichier')->store('uploads');

        $element->multimedias()->create([
            'type' => $request->type,
            'fichier' => $filePath,
        ]);

        return redirect()->route('multimedias.index', $elementId);
    }

    public function destroy(Multimedia $multimedia)
    {
        // Delete the file from storage
        if ($multimedia->chemin && Storage::exists($multimedia->chemin)) {
            Storage::delete($multimedia->chemin);
        }
        
        // Get the element and category IDs before deleting the multimedia
        $element = $multimedia->element;
        $category = $element->category;
        
        // Delete the multimedia record
        $multimedia->delete();

        return redirect()->route('elements.edit', [$category, $element])
            ->with('success', 'Fichier supprimé avec succès');
    }
}
