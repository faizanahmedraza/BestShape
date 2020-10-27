<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeResourceCollection;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show(Recipe $recipe): RecipeResource
    {
        return new RecipeResource($recipe);
    }

    public function index(): RecipeResourceCollection
    {
        return new RecipeResourceCollection( Recipe::paginate());
    }

    public function store(Request $request)
    {

        $request->validate([
            'recipeImage' => 'required',
            'name'  => 'required',
            'description' => 'required',
            'category' => 'required',
            'netcarb' => 'required',
            'netcarb_p' => 'required',
            'totalcarb' => 'required',
            'totalcarb_p' => 'required',
            'netcal' => 'required',
            'totalfat' => 'required',
            'totalfat_p' => 'required',
            'choles' => 'required',
            'choles_p' => 'required',
            'sod' => 'required',
            'sod_p' => 'required',
            'pot' => 'required',
            'pot_p' => 'required'
        ]);
        
        $recipe = Recipe::create($request->all());
        return response()->json($recipe, 201);
    }


    public function update(Recipe $recipe, Request $request): RecipeResource
    {
        $recipe->update($request->all());
        return new RecipeResource($recipe);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return response()->json();
    }

    public function profileImage(Requset $request)
    {
        dd($request->all());
    }
}
