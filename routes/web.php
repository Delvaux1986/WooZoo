<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EnclosureController;
use App\Http\Controllers\SpeciesController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');



Route::get('/healers', [UsersController::class, 'index'])->middleware('auth')->name('users');

Route::get('/animals', [PetsController::class, 'index'])->middleware('auth')->name('animals');
Route::get('/animals/create', [PetsController::class, 'create'])->middleware('auth')->name('animals.create');
Route::get('/animals/{pet}', [PetsController::class, 'show'])->middleware('auth')->name('animals.show');
Route::get('/animals/edit/{id}', [PetsController::class, 'edit'])->middleware('auth')->name('animals.edit');
Route::post('/animals/update/{pet}', [PetsController::class, 'update'])->middleware('auth')->name('animals.update');
Route::post('/animals/store', [PetsController::class, 'store'])->middleware('auth')->name('animals.store');
Route::get('/animals/destroy/{id}', [PetsController::class, 'destroy'])->middleware('auth')->name('animals.delete');



Route::get('/species', [SpeciesController::class, 'index'])->middleware('auth')->name('species');
Route::get('/species/create', [SpeciesController::class, 'create'])->middleware('auth')->name('species.create');
Route::get('/species/{specie}', [SpeciesController::class, 'show'])->middleware('auth')->name('species.show');
Route::get('/species/edit/{id}', [SpeciesController::class, 'edit'])->middleware('auth')->name('species.edit');
Route::post('/species/update/{specie}', [SpeciesController::class, 'update'])->middleware('auth')->name('species.update');
Route::post('/species/store', [SpeciesController::class, 'store'])->middleware('auth')->name('species.store');
Route::get('/species/destroy/{id}', [SpeciesController::class, 'destroy'])->middleware('auth')->name('species.delete');

Route::get('/enclosure', [EnclosureController::class, 'index'])->middleware('auth')->name('enclosures');
Route::get('/enclosure/create', [EnclosureController::class, 'create'])->middleware('auth')->name('enclosures.create');
Route::get('/enclosure/{enclosure}', [EnclosureController::class, 'show'])->middleware('auth')->name('enclosures.show');
Route::get('/enclosure/edit/{id}', [EnclosureController::class, 'edit'])->middleware('auth')->name('enclosures.edit');
Route::post('/enclosure/update/{specie}', [EnclosureController::class, 'update'])->middleware('auth')->name('enclosures.update');
Route::post('/enclosure/store', [EnclosureController::class, 'store'])->middleware('auth')->name('enclosures.store');
Route::get('/enclosure/destroy/{id}', [EnclosureController::class, 'destroy'])->middleware('auth')->name('enclosures.delete');

// ROUTE FOR CHANGING LUNCHTIME BOOLEAN 
Route::post('/species/firstLunchtime/{id}/{state}', [SpeciesController::class, 'updateFirstLunchtime'])->middleware('auth')->name('update.firstlunchtime');
Route::post('/species/secondLunchtime/{id}/{state}', [SpeciesController::class, 'updateSecondLunchtime'])->middleware('auth')->name('update.secondlunchtime');
Route::post('/animals/feeds/{id}/{state}', [PetsController::class, 'updateFeeds'])->middleware('auth')->name('update.petfeeds');



Route::get('/mylogout' , 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy')->name('Mylogout');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
