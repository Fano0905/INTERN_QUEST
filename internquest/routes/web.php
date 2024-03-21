<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Logout;
use Whoops\Run;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/login', [AuthController::class, 'doLogin'])->name('auth.login');

Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/new', 'create')->name('create')->middleware('auth');

    Route::post('/new', 'store')->middleware('auth');

    Route::get('/{post}/edit', 'edit')->name('edit')->middleware('auth');

    Route::post('/{post}/edit', 'update')->middleware('auth');

    Route::get('/{slug}-{post}', [BlogController::class, 'show'])->where([
        'post' => '[0-9]+', 
        'slug' => '[a-z0-9A-Z\-]+'
    ])->name('show');
    Route::delete('/posts/{post}', [BlogController::class, 'destroy'])->name('posts.destroy');
});
