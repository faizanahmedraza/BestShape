<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::simplePaginate(10);
        return view('challenge.index', ['challenges'=>$challenges]);
    }

    public function create()
    {
        return view('challenge.create');
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
        $challenge = new Challenge();
        $challenge->video_url = $video_name;
        $challenge->name = $request->name;
        $challenge->description = $request->description;
        $challenge->save();
        return redirect('/challenges');
    }

    public function show(Challenge $challenge)
    {
        return view('challenge.show', ['challenge' => $challenge]);
    }

    public function edit(Challenge $challenge)
    {
        return view('challenge.edit', compact('challenge'));
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

        $challenge = Challenge::findOrFail($id);
        $challenge->video_url = $video_name;
        $challenge->name = $request->name;
        $challenge->description = $request->description;
        $challenge->save();
        return redirect('/challenges/'. $challenge->id);
    }

    public function destroy(Challenge $challenge)
    {
        unlink(public_path('/videos').'/'.$challenge->video_url);
        $challenge->delete();
        return redirect('/challenges');
    }
}
