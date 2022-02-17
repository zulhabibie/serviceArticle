buat database dengan article

berikut adalah daftar api endpoint :
#no authorization header, pada header add accept : application/json#
#get all data#
Route::get('/article',[ArticlesController::class, 'index']);

#get data by id#
Route::get('/article/{id}',[ArticlesController::class, 'show']);

#add data#
Route::post('/article',[ArticlesController::class, 'store']);

#update data#
Route::put('/article/{id}',[ArticlesController::class, 'update']);

$delelte data#
Route::delete('/article/{id}',[ArticlesController::class, 'destroy']);
