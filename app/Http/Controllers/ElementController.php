<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index($categoryId)
    {
        $category = Categorie::findOrFail($categoryId);
        $elements = $category->elements;
        return view('elements.index', compact('elements', 'category'));
    }

    public function create($categoryId)
    {
        $category = Categorie::findOrFail($categoryId);
        return view('elements.create', compact('category'));
    }

    public function store(Request $request, $categoryId)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        $category = Categorie::findOrFail($categoryId);
        $category->elements()->create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('elements.index', $categoryId);
    }

    public function edit($categoryId, $elementId)
    {
        $category = Categorie::findOrFail($categoryId);
        $element = Element::findOrFail($elementId);
        return view('elements.edit', compact('category', 'element'));
    }

    public function update(Request $request, $categoryId, $elementId)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        $category = Categorie::findOrFail($categoryId);
        $element = Element::findOrFail($elementId);
        $element->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('elements.index', $categoryId);
    }

    public function destroy($categoryId, $elementId)
    {
        $category = Categorie::findOrFail($categoryId);
        $element = Element::findOrFail($elementId);
        $element->delete();
        return redirect()->route('elements.index', $categoryId);
    }

    public function showUploadForm($categoryId, $elementId)
    {
        $category = Categorie::findOrFail($categoryId);
        $element = Element::findOrFail($elementId);
        return view('multimedias.upload', compact('category', 'element'));
    }

    public function uploadFile(Request $request, $categoryId, $elementId)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,mp4,mp3,wav',
        ]);

        $element = Element::findOrFail($elementId);
        $file = $request->file('file');
        $type = null;
        $extension = $file->getClientOriginalExtension();
        if (in_array($extension, ['jpeg', 'jpg', 'png'])) {
            $type = 'image';
        } elseif (in_array($extension, ['mp4'])) {
            $type = 'video';
        } elseif (in_array($extension, ['mp3', 'wav'])) {
            $type = 'audio';
        }
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        $element->multimedias()->create([
            'type' => $type,
            'fichier' => 'uploads/'.$filename,
        ]);

        return redirect()->route('elements.index', $categoryId)->with('success', 'Fichier uploadé avec succès.');
    }

    public function show($categoryId, $elementId)
    {
        $element = Element::with(['categorie', 'multimedias'])->findOrFail($elementId);
        return view('elements.show', compact('element'));
    }
}
