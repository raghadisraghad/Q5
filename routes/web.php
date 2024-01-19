<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;

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

Route::get('/profile', function () {
    return view('profile');
});

// Route::get('/profile/updateProfileInformation', 'ProfileController@updateProfileInformation')->name('profile.updateProfileInformation');

// Routes pour les étudiants
Route::middleware(['auth'])->resource('etudiants', EtudiantController::class);

// Routes pour les filières
Route::middleware(['auth'])->resource('filieres', FiliereController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
