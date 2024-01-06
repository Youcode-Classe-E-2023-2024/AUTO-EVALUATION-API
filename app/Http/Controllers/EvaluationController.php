<?php

namespace App\Http\Controllers;

use App\Models\EvaluationModel;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return EvaluationModel::with('competence' , 'evaluateur' , 'evalue' , 'session')->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'remarque'=>'required',
            'start_At'=>'required',
            'end_At'=>'required',
            'competence_id'=>'required',
            'user_evaluateur_id'=>'required',
            'user_evalue_id'=>'required',
            'session_id'=>'required',
        ]);
        return EvaluationModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evaluation = EvaluationModel::with('competence' , 'evaluateur' , 'evalue' , 'session')->find($id);
        if($evaluation){
            return $evaluation;
        }else{
            return response()->json(['error' => 'evaluation not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluation = EvaluationModel::find($id);
        $evaluation->update($request->all());
        return $evaluation;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return EvaluationModel::destroy($id);
    }
}
