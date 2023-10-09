<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

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

// ACCUEIL
Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');

// ETUDIANTS
Route::get('/etudiant-{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');

Route::get('/create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('/create', [EtudiantController::class, 'store']);

Route::get('/edit/etudiant-{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('/edit/etudiant-{etudiant}', [EtudiantController::class, 'update']);

Route::delete('/etudiant-{etudiant}', [EtudiantController::class, 'destroy']);

// LOGIN
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);

// LOGOUT :
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

// FORUM
