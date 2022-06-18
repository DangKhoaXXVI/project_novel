<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeNovelController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;


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





Route::get('/log-out', [UserController::class, 'logOut'])->name('log-out');
Route::post('/log-in', [UserController::class, 'logIn'])->name('loginnn');
Route::get('/log-in', [UserController::class, 'viewLogin'])->name('log-in');

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::get('/category/{slug}', [IndexController::class, 'category']);

Route::get('/novel/{slug}', [IndexController::class, 'novel']);

Route::get('/chapter/{id}-{slug}', [IndexController::class, 'chapter'])->name('chapter');

Auth::routes();


Route::middleware('auth')->group(function () {
    //
});

Route::prefix('admin')->middleware('checkadmin','auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('homeAdmin');
    
    Route::resource('/typenovel', TypeNovelController::class);

    Route::resource('/novel', NovelController::class);

    Route::resource('/chapter', ChapterController::class);

    Route::resource('/category', CategoryController::class);

});


