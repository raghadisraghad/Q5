<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filieres;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filieres::all();
        return response()->json($filieres);
    }

    public function store(Request $request)
    {
        $filieres = Filieres::create($request->all());
        return response()->json($filieres);
    }

    public function show($id)
    {
        $filieres = Filieres::findOrFail($id);
        return response()->json($filieres);
    }

    public function update(Request $request, $id)
    {
        $filieres = Filieres::findOrFail($id);
        $filieres->update($request->all());
        return response()->json($filieres);
    }

    public function destroy($id)
    {
        $filieres = Filieres::findOrFail($id);
        $filieres->delete();
        return response()->json($filieres);
    }
}
