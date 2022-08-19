<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatagoriesController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','role:Admin'])->name('dashboard');


Route::get('/create', [
    CatagoriesController::class,'create'
]);

Route::post('/store', [
    CatagoriesController::class,'store'
]);

Route::get('/cat', [
    CatagoriesController::class,'index'
]);

Route::get('/edit/{id}', [
    CatagoriesController::class,'edit'
]);

Route::post('/update/{id}', [
    CatagoriesController::class,'update'
]);

Route::get('/delete/{id}', [
    CatagoriesController::class,'delete'
]);


require __DIR__.'/auth.php';


