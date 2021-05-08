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

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/healers', [UsersController::class, 'index'])->name('users');

Route::get('/animals', [PetsController::class, 'index'])->name('animals');
Route::get('/animals/create', [PetsController::class, 'create'])->name('animals.create');
Route::get('/animals/{pet}', [PetsController::class, 'show'])->name('animals.show');
Route::get('/animals/edit/{id}', [PetsController::class, 'edit'])->name('animals.edit');
Route::post('/animals/update/{pet}', [PetsController::class, 'update'])->name('animals.update');
Route::post('/animals/store', [PetsController::class, 'store'])->name('animals.store');
Route::get('/animals/destroy/{id}', [PetsController::class, 'destroy'])->name('animals.delete');



Route::get('/species', [SpeciesController::class, 'index'])->name('species');
Route::get('/species/create', [SpeciesController::class, 'create'])->name('species.create');
Route::get('/species/{specie}', [SpeciesController::class, 'show'])->name('species.show');
Route::get('/species/edit/{id}', [SpeciesController::class, 'edit'])->name('species.edit');
Route::post('/species/update/{specie}', [SpeciesController::class, 'update'])->name('species.update');
Route::post('/species/store', [SpeciesController::class, 'store'])->name('species.store');
Route::get('/species/destroy/{id}', [SpeciesController::class, 'destroy'])->name('species.delete');

Route::get('/enclosure', [EnclosureController::class, 'index'])->name('enclosures');
Route::get('/enclosure/create', [EnclosureController::class, 'create'])->name('enclosures.create');
Route::get('/enclosure/{enclosure}', [EnclosureController::class, 'show'])->name('enclosures.show');
Route::get('/enclosure/edit/{id}', [EnclosureController::class, 'edit'])->name('enclosures.edit');
Route::post('/enclosure/update/{specie}', [EnclosureController::class, 'update'])->name('enclosures.update');
Route::post('/enclosure/store', [EnclosureController::class, 'store'])->name('enclosures.store');
Route::get('/enclosure/destroy/{id}', [EnclosureController::class, 'destroy'])->name('enclosures.delete');

// ROUTE FOR CHANGING LUNCHTIME BOOLEAN 
Route::post('/species/firstLunchtime/{id}/{state}', [SpeciesController::class, 'updateFirstLunchtime'])->name('update.firstlunchtime');
Route::post('/species/secondLunchtime/{id}/{state}', [SpeciesController::class, 'updateSecondLunchtime'])->name('update.secondlunchtime');
Route::post('/animals/feeds/{id}/{state}', [PetsController::class, 'updateFeeds'])->name('update.petfeeds');



Route::post('/mylogout' , 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy')->name('Mylogout');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
