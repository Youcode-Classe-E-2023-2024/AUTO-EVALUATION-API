<?php

namespace App\Http\Controllers;

use App\Models\CompetenceModel;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompetenceModel::with('categorie')->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'coefficient'=>'required',
            'categoryId'=>'required',
        ]);
        return CompetenceModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competence = CompetenceModel::with('categorie')->find($id);


        if ($competence) {
            return $competence;
        } else {

            return response()->json(['error' => 'Competence not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $competence = CompetenceModel::find($id);
        $competence->update($request->all());
        return $competence;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return CompetenceModel::destroy($id);
    }
}
