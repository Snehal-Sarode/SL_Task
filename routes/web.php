<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LarataskController;
  
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
    return view('add_form');
});




Route::resource('laraform', LarataskController::class);
Route::put('update/{id}',[LarataskController::class, 'update'])->name('laraform.update');
Route::get('laraform/{id}',[LarataskController::class, 'show'])->name('laraform.show');

//Route::resource('/', LarataskController::class);
// Route::resource('laraform.store', [LarataskController::class,'store']);
