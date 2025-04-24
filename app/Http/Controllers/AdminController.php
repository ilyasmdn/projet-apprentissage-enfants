<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function dashboard()
    {
        $categories = Categorie::with('elements')->get();
        return view('admin.dashboard', compact('categories'));
    }

    public function getElementsForCategory($categorieId)
    {
        $elements = Element::where('categorie_id', $categorieId)->get();
        return view('admin.elements-list', compact('elements'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required'
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['mot_de_passe'], $admin->mot_de_passe)) {
            Auth::guard('admin')->login($admin);
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
