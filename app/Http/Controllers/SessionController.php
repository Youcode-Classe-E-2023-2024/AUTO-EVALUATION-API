<?php

namespace App\Http\Controllers;

use App\Models\SessionModel;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = SessionModel::with('subject', 'group')->get();
        return $sessions;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_at'=>'required',
            'end_at'=>'required',
            'subject_id'=>'required',
            'group_id'=>'required'
        ]);

        return SessionModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $session = SessionModel::with('subject', 'group')->find($id);

        if ($session) {
            return $session;
        } else {

            return response()->json(['error' => 'session not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $session = SessionModel::find($id);
        $session->update($request->all());
        return $session;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return SessionModel::destroy($id);

    }
}
