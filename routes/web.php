<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForumPostController;
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
Route::get('/forum', [ForumPostController::class, 'index'])->name('forum.index')->middleware('auth');
Route::get('/forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('/forum-create', [ForumPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum-create', [ForumPostController::class, 'store']);
Route::get('/forum-edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit');
Route::put('/forum-edit/{forumPost}', [ForumPostController::class, 'update']);
Route::delete('/forum/{forumPost}', [ForumPostController::class, 'destroy']);
