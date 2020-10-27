<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::simplePaginate(10);
        return view('exercise.index', ['exercises'=>$exercises]);
    }

    public function create()
    {
        return view('exercise.create');
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'video_url' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $file = $request->file('video_url');
        $video_name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/videos');
        $file->move($destinationPath, $video_name);
        $exercise = new Exercise();
        $exercise->video_url = $video_name;
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->save();
        return redirect('/exercises');
    }

    public function show(Exercise $exercise)
    {
        return view('exercise.show', ['exercise' => $exercise]);
    }

    public function edit(Exercise $exercise)
    {
        return view('exercise.edit', compact('exercise'));
    }

    public function update(Request $request,$id)
    {
        $validateData = $request->validate([
            'video_url' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        $file = $request->file('video_url');
        $video_name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/videos');
        $file->move($destinationPath, $video_name);
        
        $exercise = Exercise::findOrFail($id);
        $exercise->video_url = $video_name;
        $exercise->name = $request->name;
        $exercise->description = $request->description;
        $exercise->save();
        return redirect('/exercises/'.$exercise->id);
    }

    public function destroy(Exercise $exercise)
    {
        unlink(public_path('/videos/'.$exercise->video_url));
        $exercise->delete();
        return redirect('/exercises');
    }
}
