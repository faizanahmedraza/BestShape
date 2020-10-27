<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecipesController;
use App\Http\Controllers\Api\ExercisesController;
use App\Http\Controllers\Api\ChallengesController;
use App\Http\Controllers\Api\BusersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'recipes' => RecipesController::class,
    'exercises' => ExercisesController::class,
    'challenges' => ChallengesController::class,
]);
Route::apiResource('busers', BusersController::class)->only([
    'index','show','update'
]);
Route::post('buser/signup',[App\Http\Controllers\Api\BusersController::class, 'register'])->name('buser.register');
Route::post('buser/login',[App\Http\Controllers\Api\BusersController::class, 'login'])->name('buser.login');
Route::post('buser/logout',[App\Http\Controllers\Api\BusersController::class, 'logout'])->name('buser.logout');
Route::post('buser/forgotpassword',[App\Http\Controllers\Api\BusersController::class, 'reset'])->name('buser.reset');