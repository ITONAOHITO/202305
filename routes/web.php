<?php

use App\Http\Controllers\Tweet\PostController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('tweet')->middleware(['auth'])->group(function() {
    Route::post('post', [PostController::class,'post']);
    Route::get('post', [PostController::class,'index']);
    Route::get('post/delete', [PostController::class,'destroy']);
});


Auth::routes();
