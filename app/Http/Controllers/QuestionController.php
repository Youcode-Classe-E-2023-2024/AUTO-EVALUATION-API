<?php


namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return QuestionModel::with('competence')->get();
//       return QuestionModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text'=>'required',
            'response'=>'required',
            'competence_id'=>'required',
        ]);
        return QuestionModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return QuestionModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = QuestionModel::find($id);
        $question->update($request->all());
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return QuestionModel::destroy($id);
    }
}
