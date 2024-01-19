<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filieres;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filieres::all();
        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.form');
    }

    public function store(Request $request)
    {
        Filieres::create($request->all());
        return redirect()->route('filieres.index');
    }

    public function show(string $id)
    {
        $filieres = Filieres::find($id);
        return view('filieres.show', compact('filieres'));
    }

    public function edit(string $id)
    {
        $filieres = Filieres::find($id);
        return view('filieres.form', compact('filieres'));
    }

    public function update(Request $request, string $id)
    {
        $filieres = Filieres::find($id);
        $filieres->nom = $request->input('nom');
        $filieres->save();
        return redirect()->route('filieres.index');
    }

    public function destroy(string $id)
    {
        $filieres = Filieres::find($id);
        $filieres->delete();
        return redirect()->route('filieres.index');
    }
}
