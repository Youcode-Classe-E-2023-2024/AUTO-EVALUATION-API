<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Couchbase\SubdocumentException;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubjectModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'title'=>'required',
           'description'=>'required',
           'competence_id'=>'required',
       ]);
       return SubjectModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return SubjectModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = SubjectModel::find($id);
        $subject->update($request->all());
        return $subject;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return SubjectModel::destroy($id);
    }
}
