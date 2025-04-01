<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:admins,email',
            'mot_de_passe' => 'required|min:6',
        ]);

        Admin::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => bcrypt($request->mot_de_passe),
        ]);

        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe ? bcrypt($request->mot_de_passe) : $admin->mot_de_passe,
        ]);

        return redirect()->route('admins.index');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index');
    }
}
