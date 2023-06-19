<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\VillesController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PdfController;

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
    return view('index');
}) -> name('accueil');

// ========== Index des Etudiants ==========
Route::get('/etudiants', [EtudiantsController::class, 'index']) -> name('etudiants.index');

// ========== Creation des Etudiants ==========
Route::get('/etudiant-create', [VillesController::class, 'index'])->name('etudiant.create');
Route::post('/etudiant-create', [EtudiantsController::class, 'store']);

// ========== Show d'un Etudiant ==========
Route::get('/etudiants/{etudiants}', [EtudiantsController::class, 'show']) -> name('etudiant.show');

// ========== Edit d'un Etudiant ==========
Route::get('/etudiant-edit/{etudiants}', [EtudiantsController::class, 'edit']) -> name('etudiant.edit');
Route::put('/etudiant-edit/{etudiants}', [EtudiantsController::class, 'update']);

// ========== Suppression d'un Etudiant ==========
Route::delete('/etudiants/{etudiants}', [EtudiantsController::class, 'destroy'])->name('etudiant.destroy');

// ========= Connection d'un User ==========
Route::get('login', [CustomAuthController::class, 'index']) -> name('login');
Route::post('login', [CustomAuthController::class, 'authentication']) -> name('login.authentication');

// ========= Déconnection d'un User ==========
Route::get('logout', [CustomAuthController::class, 'logout']) -> name('logout');
Route::get('user-list', [CustomAuthController::class, 'userList']) -> name('user.list') -> middleware('auth');

// ========= Oublie de Mot de Passe ==========
Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword']) -> name('forgot.password');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword']);
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword']) -> name('new.password');
Route::put('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);

// ========== Création et Mise à jour d'un Post Forum ==========
Route::get('/forum', [ForumPostController::class, 'index']) -> name('forum.index'); 

Route::get('/forum/{forumPost}', [ForumPostController::class, 'show']) -> name('forum.show') -> middleware('auth');

Route::get('/forumPost-create', [ForumPostController::class, 'create']) -> name('forum.create') -> middleware('auth');
Route::post('/forumPost-create', [ForumPostController::class, 'store']); 

Route::get('/forumPost-edit/{forumPost}', [ForumPostController::class, 'edit']) -> name('forum.edit') -> middleware('auth');
Route::put('/forumPost-edit/{forumPost}', [ForumPostController::class, 'update']);

Route::delete('/forum/{forumPost}', [ForumPostController::class, 'destroy']) -> name('forum.destroy') -> middleware('auth');
Route::get('/user-posts', [ForumPostController::class, 'getUserPosts'])->name('forum.userposts');

// ========== Localization Controller ===========
Route::get('lang/{locale}', [LocalizationController::class, 'index']) -> name('lang');

// ========== PDF Controller ===========
Route::get('/pdfs', [PdfController::class, 'index'])->name('pdfs.index');

Route::get('/pdfs-upload', [PdfController::class, 'upload'])->name('pdfs.upload');
Route::post('/pdfs', [PdfController::class, 'store'])->name('pdfs.store');

Route::get('/pdfs-edit/{id}', [PdfController::class, 'edit']) -> name('pdfs.edit') -> middleware('auth');
Route::put('/pdfs-update/{id}', [PdfController::class, 'update'])->name('pdfs.update');
Route::delete('/pdfs-destroy/{id}', [PdfController::class, 'destroy']) -> name('pdfs.destroy') -> middleware('auth');

Route::get('/pdfs/{id}', [PdfController::class, 'show'])->name('pdfs.show');
Route::get('/pdfs/{id}/download', [PdfController::class, 'download'])->name('pdfs.download');