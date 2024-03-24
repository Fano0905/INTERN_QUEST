<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\EntrepriseController;
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
})->name('internquest/');

Route::prefix('/user')->name('users.')->controller(UserController::class)->group(function(){
    // returns the form for adding a user
    Route::get('/create', 'create')->name('create');
    // adds a user to the database
    Route::post('/create', 'store')->name('store');
    // returns a page that shows a full user
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    // returns the form for editing a user
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('auth');
    // updates a user
    Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('auth');
    // deletes a user
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');

    Route::get('/', [UserController::class, 'index'])->name('index');
});

Route::prefix('/entreprise')->name('entreprises.')->controller(EntrepriseController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');
    
    Route::get('/{entreprise}', [EntrepriseController::class, 'show'])->name('show');
    
    Route::get('/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{entreprise}', [EntrepriseController::class, 'update'])->name('update')->middleware('auth');

    Route::delete('/{entreprise}', [EntrepriseController::class, 'destroy'])->name('destroy');

    Route::get('/', [EntrepriseController::class, 'index'])->name('index');

    Route::get('/{entreprise}/evaluate', 'evaluate')->name('evaluate')->middleware('auth');

    Route::post('/{entreprise}', 'e_store')->name('e_store');
});

Route::prefix('/offre')->name('offres.')->controller(OffreController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{offre}', [OffreController::class, 'show'])->name('show');
    
    Route::get('/{offre}/edit', [OffreController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{offre}', [OffreController::class, 'update'])->name('update')->middleware('auth');
    
    Route::delete('/{offre}', [OffreController::class, 'destroy'])->name('destroy');

    Route::get('/', [OffreController::class, 'index'])->name('index');
});

Route::prefix('/candidature')->name('candidatures.')->controller(CandidatureController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');

    Route::get('/', [CandidatureController::class, 'index'])->name('index')->middleware('auth');
});

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
    
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', [AuthController::class, 'show'])->name('show')->middleware('auth');
});

