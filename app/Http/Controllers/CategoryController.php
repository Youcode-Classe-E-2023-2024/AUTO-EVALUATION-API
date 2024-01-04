<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'description'=> 'required',

        ]);

        return CategoryModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CategoryModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = CategoryModel::find($id);
        $category->update($request->all());
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return CategoryModel::destroy($id);
    }
}
