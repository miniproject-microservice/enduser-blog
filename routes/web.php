<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register-submit', [AuthController::class, 'registerSubmit'])->name('register-submit');

Route::prefix('category/')->name('category.')->group(function () {
    Route::get('index', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});

Route::prefix('tags/')->name('tags.')->group(function () {
    Route::get('index', [TagsController::class, 'index'])->name('index');
    Route::get('create', [TagsController::class, 'create'])->name('create');
    Route::post('store', [TagsController::class, 'store'])->name('store');
    Route::get('edit/{id}', [TagsController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [TagsController::class, 'update'])->name('update');
    Route::get('delete/{id}', [TagsController::class, 'delete'])->name('delete');
});

Route::prefix('posts/')->name('posts.')->group(function () {
    Route::get('index', [PostsController::class, 'index'])->name('index');
    Route::get('create', [PostsController::class, 'create'])->name('create');
    Route::post('store', [PostsController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PostsController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [PostsController::class, 'update'])->name('update');
    Route::get('delete/{id}', [PostsController::class, 'delete'])->name('delete');
});
