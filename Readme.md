buat database dengan article
# no authorization header, pada header add accept : application/json # </br>
berikut adalah daftar api endpoint :
# get all data#
Route::get('/article',[ArticlesController::class, 'index']);</br>
# get data by id# </br>
Route::get('/article/{id}',[ArticlesController::class, 'show']);</br>
# add data # </br>
Route::post('/article',[ArticlesController::class, 'store']);</br>
# update data # </br>
Route::put('/article/{id}',[ArticlesController::class, 'update']);</br>
# delete data # </br>
Route::delete('/article/{id}',[ArticlesController::class, 'destroy']);</br>
