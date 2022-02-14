<?php
use App\Http\Controllers\ArticlesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/article',[ArticlesController::class, 'index']);
Route::get('/article/{id}',[ArticlesController::class, 'show']);
Route::post('/article',[ArticlesController::class, 'store']);
Route::put('/article/{id}',[ArticlesController::class, 'update']);
Route::delete('/article/{id}',[ArticlesController::class, 'destroy']);




