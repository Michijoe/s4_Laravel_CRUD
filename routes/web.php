<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\DocFileController;
use App\Http\Controllers\LocalizationController;
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

// HOME
Route::get('/', function () {
    return view('home');
})->name('home');

// LOCALIZATION
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// AUTH
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [CustomAuthController::class, 'tempPassword']);
Route::get('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.password');
Route::post('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);

// STUDENTS
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index')->middleware('auth');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');
Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('/etudiant-create', [EtudiantController::class, 'store']);
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('/etudiant-edit/{etudiant}', [EtudiantController::class, 'update']);
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy']);

// FORUM
Route::get('/forum', [ForumPostController::class, 'index'])->name('forum.index')->middleware('auth');
Route::get('/forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('/forum-create', [ForumPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum-create', [ForumPostController::class, 'store']);
Route::get('/forum-edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit');
Route::put('/forum-edit/{forumPost}', [ForumPostController::class, 'update']);
Route::delete('/forum/{forumPost}', [ForumPostController::class, 'destroy']);

// DOCSHARE
Route::get('/docshare', [DocFileController::class, 'index'])->name('docshare.index')->middleware('auth');
Route::get('/docshare-create', [DocFileController::class, 'create'])->name('docshare.create')->middleware('auth');
Route::post('/docshare-create', [DocFileController::class, 'store']);
Route::get('/docshare-edit/{docFile}', [DocFileController::class, 'edit'])->name('docshare.edit');
Route::put('/docshare-edit/{docFile}', [DocFileController::class, 'update']);
Route::delete('/docshare-edit/{docFile}', [DocFileController::class, 'destroy']);
Route::get('/docshare-download/{docFile}', [DocFileController::class, 'download'])->name('docshare.download');
