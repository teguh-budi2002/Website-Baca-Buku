<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home'); 
Route::get('/baca-buku/{slug}', [HomeController::class, 'readBook'])->name('read.book');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/process', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['canAcessDashboard'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/publish-book', [DashboardController::class, 'publishSomeBook']);
    Route::post('/publish-book/add', [BookController::class, 'addBook'])->name('add.book');
    Route::post('/publish-book/set-status-publish/{id}', [BookController::class, 'publishedBook'])->name('publish.book');
    Route::delete('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete.book');

    Route::get('/chapter/add-chapter/{slug}', [BookController::class,'addChapter'])->name('book.chapter');
    Route::get('/chapter/edit-chapter/{chapter_id}', [BookController::class, 'editChapter'])->name('edit.chapter');
    Route::post('/add-chapter/save/{id}', [BookController::class,'saveChapter'])->name('save.chapter');
    Route::patch('/edit-chapter/save/{id}', [BookController::class,'saveEditChapter'])->name('edit.save.chapter');

    Route::get('banner', [BannerController::class, 'manageBanner'])->name('manage.banner');
    Route::post('upload-banner', [BannerController::class, 'uploadBanner'])->name('upload.banner');
});