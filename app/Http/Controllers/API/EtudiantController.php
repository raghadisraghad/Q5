<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiants;
use App\Models\User;

class EtudiantController extends Controller
{
    
    public function index()
    {
        $etudiants = Etudiants::all();
        return response()->json($etudiants);
    }

    public function store(Request $request)
    {
        $etudiant = Etudiants::create($request->all());
        return response()->json($etudiants);
    }

    public function show($id)
    {
        $etudiant = Etudiants::findOrFail($id);
        return response()->json($etudiants);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiants::findOrFail($id);
        $etudiant->update($request->all());
        return response()->json($etudiants);
    }

    public function destroy($id)
    {
        $etudiant = Etudiants::findOrFail($id);
        $etudiant->delete();
        return response()->json($etudiants);
    }
}
