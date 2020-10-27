<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ExerciseResourceCollection;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    public function show(Exercise $exercise): ExerciseResource
    {
        return new ExerciseResource($exercise);
    }

    public function index(): ExerciseResourceCollection
    {
        return new ExerciseResourceCollection( Exercise::paginate());
    }

    public function store(Request $request)
    {

        $request->validate([
            'video_url' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $exercise = Exercise::create($request->all());
        return response()->json($exercise, 201);
    }


    public function update(Exercise $exercise, Request $request): ExerciseResource
    {
        $exercise->update($request->all());
        return new ExerciseResource($exercise);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return response()->json();
    }
}
