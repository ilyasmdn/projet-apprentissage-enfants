<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        Categorie::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Categorie::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
        ]);

        $category = Categorie::findOrFail($id);
        $category->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
