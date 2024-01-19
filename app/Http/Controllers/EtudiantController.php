<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiants;
use App\Models\User;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiants::all();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiants.form');
    }

    public function store(Request $request)
    {
        Etudiants::create($request->all());
        return redirect()->route('etudiants.index');
    }

    public function show(string $id)
    {
        $etudiants = Etudiants::find($id);
        return view('etudiants.show', compact('etudiants'));
    }

    public function edit(string $id)
    {
        $etudiants = Etudiants::find($id);
        return view('etudiants.form', compact('etudiants'));
    }

    public function update(Request $request,string $id)
    {
        $etudiants = Etudiants::find($id);
        $etudiants->nom = $request->input('nom');
        $etudiants->prenom = $request->input('prenom');
        $etudiants->sexe = $request->input('sexe');
        $etudiants->filiere_id = $request->input('filiere_id');
        $etudiants->user_id = $request->input('user_id');
        $etudiants->save();
        return redirect()->route('etudiants.index');
    }

    public function destroy(string $id)
    {
        $etudiants = Etudiants::find($id);
        $etudiants->delete();
        return redirect()->route('etudiants.index');
    }
}
