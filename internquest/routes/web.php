<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Promos_UserController;
use Illuminate\Auth\Events\Logout;

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

Route::get('/user/list', [WebController::class, 'index'])->name('users.list')->middleware('auth');

Route::get('/', [WebController::class, 'web'])->name('internquest/');

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
    Route::get('user/', 'create')->name('create');
    
    Route::post('user/', 'store')->name('store');
    
    Route::get('/{user}', [UserController::class, 'show'])->name('show')->middleware('auth');
    
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('auth');
    
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');

    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::get('/admin', [UserController::class, 'notifs'])->name('notifications');

    Route::get('/{user}', [UserController::class, 'approve'])->name('approve');

    Route::delete('/{user}', [UserController::class, 'disapprove'])->name('disapprove');
});

//Routes entreprise

Route::prefix('/company')->name('companies.')->controller(CompanyController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');
    
    Route::get('/{company}', [CompanyController::class, 'show'])->name('show');
    
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{company}', [CompanyController::class, 'update'])->name('update')->middleware('auth');

    Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('destroy')->middleware('auth');

    Route::get('/', [CompanyController::class, 'index'])->name('index');

    Route::get('/{company}/evaluate', [CompanyController::class, 'evaluate'])->name('evaluate')->middleware('auth');

    Route::get('/{evaluation}/edit', 'e_edit')->name('e_edit')->middleware('auth');

    Route::put('/{evaluation}/edit', 'e_update')->name('e_update');

    Route::get('/evaluations', [CompanyController::class, 'list'])->name('list');

    Route::post('/{company}', 'e_store')->name('e_store');

    Route::post('/{company}/address', 'addAddress')->name('address')->middleware('auth');
});

//Routes Offres

Route::prefix('/offer')->name('offers.')->controller(OfferController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{offer}', [OfferController::class, 'show'])->name('show');
    
    Route::get('/{offer}/edit', [OfferController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{offer}', [OfferController::class, 'update'])->name('update')->middleware('auth');
    
    Route::delete('/{offer}', [OfferController::class, 'destroy'])->name('destroy')->middleware('auth');

    Route::get('/', [OfferController::class, 'index'])->name('index');
});

//Routes candidatures

Route::prefix('/application')->name('applications.')->controller(ApplicationController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');

    Route::get('/', [ApplicationController::class, 'index'])->name('index')->middleware('auth');
});

//Routes authentifications

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
    
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', [AuthController::class, 'show'])->name('show')->middleware('auth');
});

//Routes Promos

Route::prefix('/promo')->name('promos.')->controller(PromoController::class)->group(function(){
    Route::get('/', 'index')->name('index')->middleware('auth');

    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{promo}/edit', 'edit')->name('edit')->middleware('auth');

    Route::put('/{promo}', 'update')->name('update');

    Route::get('/{promo}', 'show')->name('show')->middleware('auth');

    Route::delete('/{promo}', 'destroy')->name('destroy')->middleware('auth');
});

Route::prefix('/promo/etudiant')->name('classes.')->controller(Promos_UserController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{etudiant}/edit', 'edit')->name('edit')->middleware('auth');

    Route::put('/{etudiant}', 'update')->name('update');

    Route::delete('/{user}', 'destroy')->name('destroy')->middleware('auth');
});

Route::prefix('/address')->name('locations.')->controller(LocationController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/create', 'store')->name('store');

    Route::get('/{location}/edit', 'edit')->name('edit');

    Route::put('/{location}', 'update')->name('update');

    Route::delete('/{location}', 'destroy')->name('destroy');
});
