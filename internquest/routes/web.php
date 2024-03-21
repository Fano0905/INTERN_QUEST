<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Logout;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can user web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/user')->name('users.')->group(function(){
    // returns the form for adding a user
    Route::get('/create', [UserController::class, 'create'])->name('create');
    // adds a user to the database
    Route::post('/create', [UserController::class, 'store'])->name('store');
    // returns a page that shows a full user
    Route::get('/{user}', UserController::class .'@show')->name('show');
    // returns the form for editing a user
    Route::get('/{user}/edit', UserController::class .'@edit')->name('edit');
    // updates a user
    Route::put('/{user}', UserController::class .'@update')->name('update');
    // deletes a user
    Route::delete('/{user}', UserController::class .'@destroy')->name('destroy');

    Route::get('/', UserController::class .'@index')->name('index');
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/login', [AuthController::class, 'doLogin'])->name('auth.login');

Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', [AuthController::class, 'show'])->name('auth.show')->middleware('auth');

