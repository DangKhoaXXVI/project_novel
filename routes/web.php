<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeNovelController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentTopicController;




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





Route::get('/dang-xuat', [UserController::class, 'logOut'])->name('log-out');


Route::post('/dang-nhap', [UserController::class, 'logIn'])->name('loginnn');
Route::get('/dang-nhap', [UserController::class, 'viewLogin'])->name('log-in');

// Route::post('/sign-up', [UserController::class, 'signUp'])->name('sign-up');
Route::get('/dang-ky', [UserController::class, 'ViewsignUp'])->name('sign-up-view');

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::get('/the-loai/{slug}', [IndexController::class, 'category'])->name('category');

Route::get('/truyen/{slug}', [IndexController::class, 'novel'])->name('novel');

Route::get('/chuong/{id}-{slug}', [IndexController::class, 'chapter'])->name('chapter');

Route::get('/danh-sach-truyen-moi-nhat', [IndexController::class, 'listnewnovel'])->name('AllNewNovel');

Route::get('/danh-sach-truyen-da-hoan-thanh', [IndexController::class, 'listcompletednovel'])->name('AllCompleted');

Route::get('/danh-sach-truyen-co-chuong-moi-nhat', [IndexController::class, 'listnewchapter'])->name('AllNewChapter');

Route::get('/tac-gia/{author}', [IndexController::class, 'author'])->name('ListNovelAuthor');

Route::get('/tim-kiem', [IndexController::class, 'search'])->name('search');

Route::get('/thanh-vien/{id}', [UserController::class, 'member_wall'])->name('member_wall');

Route::get('/bai-viet', [TopicController::class, 'index'])->name('index_topic');

Route::get('/bai-viet/{id}-{slug}', [TopicController::class, 'detail'])->name('detail_topic');


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::put('/thanh-vien/{id}', [UserController::class, 'update'])->name('update_member');

    Route::post('/danh-gia-truyen', [UserController::class, 'rating'])->name('rating-novel');
    Route::post('/yeu-thich', [UserController::class, 'favorite'])->name('favorite');

    Route::get('/danh-sach-yeu-thich', [UserController::class, 'favorite_page'])->name('favorite_page');

    Route::post('truyen/binh-luan/{novel_id}', [UserController::class, 'comment'])->name('comment');
    Route::put('truyen/binh-luan/cap-nhat/{cmt_id}', [UserController::class, 'updatecomment'])->name('updatecomment');
    Route::put('truyen/binh-luan/xoa/{cmt_id}', [UserController::class, 'deletecomment'])->name('deletecomment');

    Route::post('bai-viet/binh-luan/{topic_id}', [CommentTopicController::class, 'comment_topic'])->name('comment_topic');
    Route::put('bai-viet/binh-luan/cap-nhat/{cmt_id}', [CommentTopicController::class, 'updatecomment_topic'])->name('updatecomment_topic');
    Route::put('bai-viet/binh-luan/xoa/{cmt_id}', [CommentTopicController::class, 'deletecomment_topic'])->name('deletecomment_topic');

    Route::get('bai-viet/tao-bai-viet', [TopicController::class, 'create'])->name('create_topic');
    Route::post('bai-viet/luu-bai-viet', [TopicController::class, 'store'])->name('store_topic');
    Route::get('bai-viet/{topic_id}/chinh-sua', [TopicController::class, 'edit'])->name('edit_topic');
    Route::put('bai-viet/{topic_id}/cap-nhat', [TopicController::class, 'update'])->name('update_topic');
    Route::put('bai-viet/{topic_id}/xoa', [TopicController::class, 'delete'])->name('delete_topic');

});

Route::prefix('admin')->middleware('checkadmin','auth')->group(function () {

    Route::get('/trang-quan-ly', [HomeController::class, 'index'])->name('homeAdmin');
    
    Route::resource('/loai-truyen', TypeNovelController::class);

    Route::resource('/truyen', NovelController::class);

    Route::resource('/chuong', ChapterController::class);

    Route::resource('/the-loai', CategoryController::class);

    Route::get('/thanh-vien', [UserController::class, 'index'])->name('admin_index_member');

    Route::get('/thanh-vien/{id}/chinh-sua', [UserController::class, 'edit'])->name('admin_edit_member');

    Route::put('/thanh-vien/{id}/chinh-sua', [UserController::class, 'admin_update'])->name('admin_update_member');

    Route::get('/truyen/{novel_id}/danh-sach-chuong', [NovelController::class, 'showListChapter'])->name('list_chapter');

    Route::get('/truyen/{novel_id}/danh-sach-chuong/them-chuong', [NovelController::class, 'showAddChapter'])->name('index_add_chapter');


});


