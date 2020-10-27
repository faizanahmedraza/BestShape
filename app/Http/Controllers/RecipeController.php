<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::simplePaginate(10);
        return view('recipe.index', ['recipes'=>$recipes]);
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
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

        $image = $request->file('recipeImage');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        
        $recipe = new Recipe();
        $recipe->recipeImage = $imageName;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->category = $request->category; 
        $recipe->netcarb = $request->netcarb;
        $recipe->netcarb_p = $request->netcarb_p;
        $recipe->totalcarb = $request->totalcarb;
        $recipe->totalcarb_p = $request->totalcarb_p;
        $recipe->netcal = $request->netcal;
        $recipe->totalfat = $request->totalfat;
        $recipe->totalfat_p = $request->totalfat_p;
        $recipe->choles = $request->choles;
        $recipe->choles_p = $request->choles_p;
        $recipe->sod = $request->sod;
        $recipe->sod_p = $request->sod_p; 
        $recipe->pot = $request->pot;
        $recipe->pot_p = $request->pot_p;
        $recipe->buser_id = 1;
        $recipe->save();

        return redirect('/recipes');
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', ['recipe' => $recipe]);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'));
    }

    public function update(Request $request,$id)
    {
        $validateData = $request->validate([
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

        $file = $request->file('recipeImage');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $file->move($destinationPath, $imageName);
      
        $recipe = Recipe::findOrFail($id);
        $recipe->recipeImage = $imageName;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->category = $request->category; 
        $recipe->netcarb = $request->netcarb;
        $recipe->netcarb_p = $request->netcarb_p;
        $recipe->totalcarb = $request->totalcarb;
        $recipe->totalcarb_p = $request->totalcarb_p;
        $recipe->netcal = $request->netcal;
        $recipe->totalfat = $request->totalfat;
        $recipe->totalfat_p = $request->totalfat_p;
        $recipe->choles = $request->choles;
        $recipe->choles_p = $request->choles_p;
        $recipe->sod = $request->sod;
        $recipe->sod_p = $request->sod_p; 
        $recipe->pot = $request->pot;
        $recipe->pot_p = $request->pot_p;
        $recipe->save();
       return redirect('/recipes/'. $recipe->id);
    }

    public function destroy(Recipe $recipe)
    {
        unlink(public_path('/images').'/'. $recipe->recipeImage);
        $recipe->delete();
        return redirect('/recipes');
    }
}
