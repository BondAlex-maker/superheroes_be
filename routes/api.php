<?php
use App\Http\Controllers\ImageController;
use \App\Http\Controllers\SuperheroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });
Route::apiResource('/images',ImageController::class);
Route::apiResource('/superheroes',SuperheroController::class);
Route::get('/{nickname}', [SuperheroController::class, 'getPostsBySuperheroNickname']);
Route::post('superheroes/edit/{superhero}', [SuperheroController::class, 'edit']);
