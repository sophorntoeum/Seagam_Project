<?php

namespace App\Http\Controllers;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $teams = TeamResource::collection($teams);
        return response()->json(['Get all team success'=>true, 'data'=>$teams], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = Team::store($request);
        return response()->json(['Create team success' => true, 'data' => $team], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::find($id);
        $team = new TeamResource($team);
        return response()->json(['show team success'=>true, 'data'=>$team], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $team = Team::store($request, $id);
       return response()->json(['Update team success'=>true, 'data'=>$team], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);
        $team -> delete();
        return response()->json(['Delete team success'=>true, 'data'=>$team], 201);
    }
}
