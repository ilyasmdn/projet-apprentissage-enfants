<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Multimedia;
use Illuminate\Http\Request;

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

    public function destroy($elementId, $multimediaId)
    {
        $multimedia = Multimedia::findOrFail($multimediaId);
        $multimedia->delete();
        return redirect()->route('multimedias.index', $elementId);
    }
}
