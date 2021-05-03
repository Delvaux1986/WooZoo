<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\homeController;
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

Route::get('/', [HomeController::class , 'index' ])->middleware('auth')->name('home');

Route::get('/healers', [UsersController::class , 'index'])->middleware('auth')->name('users');

Route::get('/animals', [PetsController::class , 'index'])->middleware('auth')->name('animals');
Route::get('/animals/create' , [PetsController::class , 'create'])->middleware('auth')->name('animals.create');
Route::get('/animals/{pet}', [PetsController::class , 'show'])->middleware('auth')->name('animals.show');
Route::get('/animals/edit/{id}' , [PetsController::class , 'edit'])->middleware('auth')->name('animals.edit');
Route::post('/animals/update/{pet}', [PetsController::class , 'update'])->middleware('auth')->name('animals.update');
Route::post('/animals/store' , [PetsController::class , 'store'])->middleware('auth')->name('animals.store');


Route::get('/species' , [SpeciesController::class , 'index'])->middleware('auth')->name('species');
Route::get('/species/{specie}', [SpeciesController::class , 'show'])->middleware('auth')->name('species.show');
Route::get('/species/edit/{id}' , [SpeciesController::class , 'edit'])->middleware('auth')->name('species.edit');
Route::post('/species/update/{specie}', [SpeciesController::class , 'update'])->middleware('auth')->name('species.update');

Route::get('/enclosure', [EnclosureController::class , 'index'])->middleware('auth')->name('enclosure');

// Route::get('/logout' , 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy')->name('logout');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
