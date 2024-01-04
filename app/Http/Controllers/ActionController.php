<?php

namespace App\Http\Controllers;

use App\Models\ActionModel;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ActionModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'text'=>'required',
           'resultat'=>'required',
           'competence_id'=>'required',
       ]);
       return ActionModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ActionModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $action = ActionModel::find($id);
        $action->update($request->all());
        return $action;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ActionModel::destroy($id);
    }
}
