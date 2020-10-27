<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    public function show(Challenge $challenge)
    {
        return response()->json(Challenge::find($challenge), 200);
    }

    public function index()
    {
        return response()->json( Challenge::paginate(), 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'video_url' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $challenge = Challenge::create($request->all());
        return response()->json($challenge, 201);
    }


    public function update(Challenge $challenge, Request $request)
    {
        $challenge->update($request->all());
        return response()->json($challenge, 200);
    }

    public function destroy(Challenge $challenge)
    {
        $challenge->delete();
        return response()->json();
    }
}
