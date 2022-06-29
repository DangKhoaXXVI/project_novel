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

// Route::post('/sign-up', [UserController::class, 'signUp'])->name('sign-up');
Route::get('/sign-up', [UserController::class, 'ViewsignUp'])->name('sign-up-view');

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::get('/category/{slug}', [IndexController::class, 'category']);

Route::get('/novel/{slug}', [IndexController::class, 'novel']);

Route::get('/chapter/{id}-{slug}', [IndexController::class, 'chapter'])->name('chapter');

Route::get('/All-New-Novel', [IndexController::class, 'listnewnovel'])->name('AllNewNovel');

Route::get('/All-Completed-Novel', [IndexController::class, 'listcompletednovel'])->name('AllCompleted');

Route::get('/All-New-Chapter', [IndexController::class, 'listnewchapter'])->name('AllNewChapter');

Route::get('/author/{author}', [IndexController::class, 'author'])->name('ListNovelAuthor');

Route::get('/search', [IndexController::class, 'search'])->name('search');

Route::get('/member/{id}', [UserController::class, 'member_wall'])->name('member_wall');


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::put('/member/{id}', [UserController::class, 'update'])->name('update_member');
    Route::post('/rating-novel', [UserController::class, 'rating'])->name('rating-novel');
    Route::post('/favorite', [UserController::class, 'favorite'])->name('favorite');
    Route::get('/favorite', [UserController::class, 'favorite_page'])->name('favorite_page');
    Route::post('/comment/{novel_id}', [UserController::class, 'comment'])->name('comment');
    Route::put('/comment/update/{cmt_id}', [UserController::class, 'updatecomment'])->name('updatecomment');
    Route::put('/comment/delete/{cmt_id}', [UserController::class, 'deletecomment'])->name('deletecomment');
});

Route::prefix('admin')->middleware('checkadmin','auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('homeAdmin');
    
    Route::resource('/typenovel', TypeNovelController::class);

    Route::resource('/novel', NovelController::class);

    Route::resource('/chapter', ChapterController::class);

    Route::resource('/category', CategoryController::class);

    Route::get('/member', [UserController::class, 'index']);

    Route::get('/member/edit/{id}', [UserController::class, 'edit']);

    Route::put('/member/edit/{id}', [UserController::class, 'admin_update'])->name('admin_update_member');

    Route::get('/novel/list-chapter/{novel_id}', [NovelController::class, 'showListChapter'])->name('list_chapter');

    Route::get('/novel/list-chapter/{novel_id}/add-chapter', [NovelController::class, 'showAddChapter'])->name('index_add_chapter');


});


