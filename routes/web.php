<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EnclosureController;

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

Route::get('/animals/{pet}', [PetsController::class , 'show'])->name('animals.show');

Route::get('/animals/edit/{id}' , [PetsController::class , 'edit'])->name('animals.edit');

Route::get('/enclosure', [EnclosureController::class , 'index'])->middleware('auth')->name('enclosure');

Route::get('/logout' , 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy')->name('logout');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
