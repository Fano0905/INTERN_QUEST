<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Promos_UserController;
use App\Http\Controllers\WishlistController;

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

/*
Route::get('/', function(){
    return \view('welcome');
});
*/

Route::prefix('/home')->name('accueil.')->group(function () {
    Route::get('/user/list', [WebController::class, 'index'])->name('users.list');
    Route::get('/pilote', [WebController::class, 'pilote'])->name('pilote');
    Route::get('/etudiant', [WebController::class, 'etudiant'])->name('etudiant');

});

Route::get('/', [WebController::class, 'web'])->name('internquest');

//Routes secteur
Route::prefix('/area')->name('areas.')->controller(AreaController::class)->group(function(){
    Route::get('/', 'index')->name('index')->middleware('auth');
    Route::get('/create', 'create')->name('create')->middleware('auth');
    Route::post('/create', 'store')->name('store');
    Route::get('/{area}/edit/', 'edit')->name('edit')->middleware('auth');
    Route::put('/{area}', 'edit');
    Route::delete('/{area}');
});

//Routes Utilisateurs

Route::prefix('/internquest')->name('internquest.')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
    Route::get('admin', [UserController::class, 'notifs'])->name('admin.notifications')->middleware('auth');
    Route::get('users/{user}/approve', [UserController::class, 'approve'])->name('users.approve')->middleware('auth');
    Route::delete('users/{user}/disapprove', [UserController::class, 'disapprove'])->name('users.disapprove')->middleware('auth');
    Route::get('/skills/add', [UserController::class, 'learn'])->name('users.learn')->middleware('auth');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
    Route::get('/search', [UserController::class, 'search'])->name('users.search');
    Route::post('/skills/', [UserController::class, 'certificate'])->name('users.confirm');
});

//Routes entreprises

Route::prefix('/company')->name('companies.')->controller(CompanyController::class)->group(function(){
    
    Route::get('/create', 'create')->name('create')->middleware('auth');
    
    Route::post('/create', 'store')->name('store');
    
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{company}', [CompanyController::class, 'update'])->name('update')->middleware('auth');

    Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('destroy')->middleware('auth');

    Route::get('', [CompanyController::class, 'index'])->name('index');

    Route::get('/stats', [CompanyController::class, 'stats'])->name('stats');

    Route::get('/{company}/evaluate', [CompanyController::class, 'evaluate'])->name('evaluate')->middleware('auth');

    Route::get('/{evaluation}/edit', [CompanyController::class, 'e_edit'])->name('e_edit')->middleware('auth');

    Route::put('/{evaluation}', [CompanyController::class, 'e_update'])->name('e_update');

    Route::get('/evaluations', [CompanyController::class, 'list'])->name('evaluations');

    Route::post('/{company}', [CompanyController::class, 'e_store'])->name('e_store');

    Route::get('/companies/filter', [CompanyController::class, 'filter'])->name('filter');

    Route::post('/{company}/address', [CompanyController::class, 'addAddress'])->name('address')->middleware('auth');

    Route::get('/{company}', [CompanyController::class, 'show'])->name('show')->middleware('auth');    

});

//Routes Offres

Route::prefix('/offer')->name('offers.')->controller(OfferController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');
    
    Route::get('/{offer}/edit', [OfferController::class, 'edit'])->name('edit')->middleware('auth');
    
    Route::put('/{offer}', [OfferController::class, 'update'])->name('update')->middleware('auth');
    
    Route::delete('/{offer}', [OfferController::class, 'destroy'])->name('destroy')->middleware('auth');

    Route::get('/', [OfferController::class, 'index'])->name('index')->middleware('auth');

    Route::get('/stats', [OfferController::class, 'stats'])->name('stats')->middleware('auth');

    Route::get('/offers/search', [OfferController::class, 'search'])->name('search');

    Route::get('/{id}', [OfferController::class, 'show'])->name('show')->middleware('auth');

    Route::get('/offers/{offer_id}/applications', [OfferController::class, 'showApplications'])->name('applications');

});

//Routes wishlist

Route::prefix('/wishlist')->name('wishlist.')->controller(WishlistController::class)->group(function(){
    Route::post('/add', [WishlistController::class, 'AddInWishlist'])->name('add.wl')->middleware('auth');

    Route::get('/show', 'wishlist')->name('show')->middleware('auth');

    Route::delete('/wishlist/{offer}', [WishlistController::class, 'suppFromWishlist'])->name('supp.wl')->middleware('auth');
});

//Routes candidatures

Route::prefix('/application')->name('applications.')->controller(ApplicationController::class)->group(function(){
    
    Route::get('/accept/{application}', 'accept_application')->name('accept')->middleware('auth');

    Route::get('/reject/{application}','reject_application')->name('reject')->middleware('auth');

    Route::get('/create/{offer}', 'create')->name('create')->middleware('auth');
    
    Route::post('/create/{offer}', 'store')->name('store');

    Route::get('/{user}', [ApplicationController::class, 'show'])->name('show');

    Route::get('/{offer}', [ApplicationController::class, 'index'])->name('index')->middleware('auth');

    Route::delete('/{application}', [ApplicationController::class, 'destroy'])->name('destroy')->middleware('auth');
});

//Routes authentifications

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function(){

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
    
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

//Routes promos etudiants

Route::prefix('/promo/etudiant')->name('classes.')->controller(Promos_UserController::class)->group(function(){
    Route::get('/create', 'create')->name('create')->middleware('auth');

    Route::post('/create', 'store')->name('store');

    Route::get('/{etudiant}/edit', 'edit')->name('edit')->middleware('auth');

    Route::put('/{etudiant}', 'update')->name('update');

    Route::delete('/{user}', 'destroy')->name('destroy')->middleware('auth');
});

//Routes adresses

Route::prefix('/address')->name('locations.')->controller(LocationController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/create', 'store')->name('store');

    Route::get('/{location}/edit', 'edit')->name('edit');

    Route::put('/{location}', 'update')->name('update');

    Route::delete('/{location}', 'destroy')->name('destroy');
});

//Routes entreprise proprio

Route::prefix('/owner')->name('owners.')->controller(CompanyOwnerController::class)->group(function(){
    Route::get('/create', 'create')->name('assign');

    Route::post('/create', 'store')->name('store');

    Route::get('/{owner}/edit', 'edit')->name('edit');

    Route::get('/{owner}', 'update')->name('edit');

    Route::delete('/{owner}', 'destroy')->name('destroy');
});
