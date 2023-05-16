<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $event = Event::all();
       $event = EventResource::collection($event);
        return response()->json(['Get all event success'=>true, 'data'=>$event], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::store($request);
        return response()->json(['Create event success'=>true, 'data'=>$event], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $event = Event::find($id);
        $event = new EventResource($event);
        return response()->json(['show event success'=>true, 'data'=>$event], 201);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::store($request, $id);
        return response()->json(['Update event success'=>true, 'data'=>$event], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event= Event::find($id);
        $event->delete();
        return response()->json(['Delete event success'=>true, 'data'=>$event], 201);
    }

    public function eventSearch($name)
    {
       $event = Event::where('name','like','%'.$name.'%')->get();
       $event = ShowEventResource::collection($event);
        return response()->json(['Get all event success'=>true, 'data'=>$event], 200);
    }
}
