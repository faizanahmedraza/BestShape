<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('buser.index');

Route::resources([
    'recipes' => RecipeController::class,
    'exercises' => ExerciseController::class,
    'challenges' => ChallengeController::class,
]);
Route::get('/user/password/reset/{user}', [App\Http\Controllers\UserController::class, 'edit']);
Route::put('/user/password/reset/{user}', [App\Http\Controllers\UserController::class, 'reset']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);
Route::get('/challenge-search', [App\Http\Controllers\SearchController::class, 'challengeSearch']);
Route::get('/recipe-search', [App\Http\Controllers\SearchController::class, 'recipeSearch']);
Route::get('/exercise-search', [App\Http\Controllers\SearchController::class, 'exerciseSearch']);
