<?php

use App\Http\Controllers\EtudiantController;
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


Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');

Route::get('/etudiant-{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

Route::get('/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/create', [EtudiantController::class, 'store']);

Route::get('/edit/etudiant-{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/edit/etudiant-{etudiant}', [EtudiantController::class, 'update']);

Route::delete('/etudiant-{etudiant}', [EtudiantController::class, 'destroy']);
