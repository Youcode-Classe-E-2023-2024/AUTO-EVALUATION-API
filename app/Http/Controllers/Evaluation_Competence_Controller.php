<?php

namespace App\Http\Controllers;

use App\Models\CompetenceModel;
use App\Models\EvaluationModel;
use Illuminate\Http\Request;

class Evaluation_Competence_Controller extends Controller
{

    public function store(Request $request){
        $request->validate([
            'evaluation_id'=>'required|exists:evaluation_models,id',
            'competence_id'=>'required|exists:competence_models,id',
            'is_correct'=>'required'
        ]);

//        $evaluations = EvaluationModel::with('competences')->get();
//        return $evaluations;

        $evaluation = EvaluationModel::find($request->evaluation_id);
        $competence = CompetenceModel::find($request->competence_id);
        if($evaluation){
            $evaluation->competences()->attach($competence , ['is_correct'=>$request->is_correct]);
            return response()->json(['message'=>'Competence attached to evaluation successfully']);

        }else{
            return response()->json(['error' => 'evaluation not found'], 404);
        }
    }
}
