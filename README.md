buat database dengan article

berikut adalah daftar api endpoint :
#no authorization header, pada header add accept : application/json#


Route::get('/article',[ArticlesController::class, 'index']);#
Route::get('/article/{id}',[ArticlesController::class, 'show']);
Route::post('/article',[ArticlesController::class, 'store']);
Route::put('/article/{id}',[ArticlesController::class, 'update']);
Route::delete('/article/{id}',[ArticlesController::class, 'destroy']);
