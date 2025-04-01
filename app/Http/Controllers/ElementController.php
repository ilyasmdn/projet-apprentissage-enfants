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
}
