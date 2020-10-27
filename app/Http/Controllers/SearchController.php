<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->search;
        $results = DB::table('busers')
            ->where('fullname','LIKE','%'.$name.'%')
            ->get();
       
            return view('search',compact('results'));

    }

    public function challengeSearch(Request $request)
    {
        $name = $request->search;
        $results = DB::table('challenges')
            ->where('name','LIKE','%'.$name.'%')
            ->get();
        
        return view('challenge.search',compact('results'));
    }

    public function recipeSearch(Request $request)
    {
        $name = $request->search;
        $results = DB::table('recipes')
            ->where('name','LIKE','%'.$name.'%')
            ->get();
        
        return view('recipe.search',compact('results'));
    }

    public function exerciseSearch(Request $request)
    {
        $name = $request->search;
        $results = DB::table('exercises')
            ->where('name','LIKE','%'.$name.'%')
            ->get();
        
        return view('exercise.search',compact('results'));
    }
}
