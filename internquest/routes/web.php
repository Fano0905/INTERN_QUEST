<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\Promos_UserController;
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

//Routes principales

Route::get('/user/list', [WebController::class, 'index'])->name('users.list');

Route::get('/', function () {
    return view('accueil');
})->name('internquest/');

Route::prefix('/promo/etudiant')->name('classes.')->controller(Promos_UserController::class)->group(function(){
    Route::get('/insert', 'create')->name('create'); // La route sera nommée 'classes.insert'
    Route::post('/insert', 'store')->name('store'); // La route sera nommée 'classes.store'
    Route::delete('/{user}', 'destroy')->name('destroy');
});

//Routes secteur
Route::prefix('/area')->name('areas.')->controller(AreaController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{area}/edit/', 'edit')->name('edit');
    Route::put('/{area}', 'edit');
    Route::delete('/{area}');
});

//Routes Utilisateurs

Route::prefix('/internquest')->name('users.')->controller(UserController::class)->group(function(){
    // returns the form for adding a user
    Route::get('user/', 'create')->name('create');
    // adds a user to the database
    Route::post('user/', 'store')->name('store');
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

//Routes entreprise

Route::prefix('/company')->name('companies.')->controller(CompanyController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');
    
    Route::get('/{company}', [CompanyController::class, 'show'])->name('show');
    
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{company}', [CompanyController::class, 'update'])->name('update')->middleware('auth');

    Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('destroy');

    Route::get('/', [CompanyController::class, 'index'])->name('index');

    Route::get('/{company}/evaluate', 'evaluate')->name('evaluate')->middleware('auth');

    Route::post('/{company}', 'e_store')->name('e_store');
});

//Routes Offres

Route::prefix('/offer')->name('offers.')->controller(OfferController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{offer}', [OfferController::class, 'show'])->name('show');
    
    Route::get('/{offer}/edit', [OfferController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{offer}', [OfferController::class, 'update'])->name('update')->middleware('auth');
    
    Route::delete('/{offer}', [OfferController::class, 'destroy'])->name('destroy');

    Route::get('/', [OfferController::class, 'index'])->name('index')->middleware('auth');
});

//Routes candidature

Route::prefix('/application')->name('applications.')->controller(ApplicationController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');

    Route::get('/', [ApplicationController::class, 'index'])->name('index')->middleware('auth');
});

//Routes authentification

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
    
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', [AuthController::class, 'show'])->name('show')->middleware('auth');
});

//Routes Promo

Route::prefix('/promo')->name('promos.')->controller(PromoController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/create', 'store')->name('store');

    Route::get('/{promo}', 'show')->name('show');

    Route::delete('/{promo}', 'destroy')->name('destroy');
});
