<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\VillesController;

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
