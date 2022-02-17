buat database dengan article

berikut adalah daftar api endpoint :
#no authorization header, pada header add accept : application/json# </br>
Route::get('/article',[ArticlesController::class, 'index']);</br>
Route::get('/article/{id}',[ArticlesController::class, 'show']);</br>
Route::post('/article',[ArticlesController::class, 'store']);</br>
Route::put('/article/{id}',[ArticlesController::class, 'update']);</br>
Route::delete('/article/{id}',[ArticlesController::class, 'destroy']);</br>
