<?php

namespace App\Http\Controllers;

use App\Models\GroupeModel;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GroupeModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'nom'=>'required',
           'description'=>'required'
        ]);

        return GroupeModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return GroupeModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = GroupeModel::find($id);
        $group->update($request->all());
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return GroupeModel::destroy($id);
    }
}
