<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index(Categorie $category)
    {
        $elements = $category->elements;
        return view('elements.index', compact('elements', 'category'));
    }

    public function create(Categorie $category)
    {
        return view('elements.create', compact('category'));
    }

    public function store(Request $request, Categorie $category)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp3,wav,mp4,mov,avi|max:10240',
        ]);

        $element = $category->elements()->create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $element->multimedias()->create([
                'chemin' => $path,
            ]);
        }

        return redirect()->route('elements.index', $category)->with('success', 'Élément créé avec succès');
    }

    public function edit(Categorie $category, Element $element)
    {
        $element->load('multimedias');
        return view('elements.edit', compact('category', 'element'));
    }

    public function update(Request $request, Categorie $category, Element $element)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        $element->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('elements.index', $category)->with('success', 'Élément mis à jour avec succès');
    }

    public function destroy(Categorie $category, Element $element)
    {
        $element->delete();
        return redirect()->route('elements.index', $category)->with('success', 'Élément supprimé avec succès');
    }

    public function show(Categorie $category, Element $element)
    {
        $element->load('multimedias');
        return view('elements.show', compact('category', 'element'));
    }

    public function showUploadForm(Categorie $category, Element $element)
    {
        return view('multimedias.upload', compact('category', 'element'));
    }

    public function uploadFile(Request $request, Categorie $category, Element $element)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp3,wav,mp4,mov,avi|max:10240',
        ]);

        $path = $request->file('file')->store('uploads');
        $element->multimedias()->create([
            'chemin' => $path,
        ]);

        return redirect()->route('elements.edit', [$category, $element])->with('success', 'Fichier uploadé avec succès');
    }
}
