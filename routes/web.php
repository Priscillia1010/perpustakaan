<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakController;

use App\Models\Rak;

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

Route::get('/petugass', [PetugasController::class, 'index'])->name('petugass.index')->middleware('auth');
Route::get('/petugass/create', [PetugasController::class, 'create'])->name('petugass.create');
Route::post('/petugass', [PetugasController::class, 'store'])->name('petugass.store');
Route::get('/petugass/{id}', [PetugasController::class, 'show'])->name('petugass.show');
Route::get('/petugass/{id}/edit', [PetugasController::class, 'edit'])->name('petugass.edit');
Route::put('/petugass/{id}', [PetugasController::class, 'update'])->name('petugass.update');
Route::delete('/petugass/{id}', [PetugasController::class, 'destroy'])->name('petugass.destroy');

Route::get('/anggotas', [AnggotaController::class, 'index'])->name('anggotas.index')->middleware('auth');
Route::get('/anggotas/create', [AnggotaController::class, 'create'])->name('anggotas.create');
Route::post('/anggotas', [AnggotaController::class, 'store'])->name('anggotas.store');
Route::get('/anggotas/{id}', [AnggotaController::class, 'show'])->name('anggotas.show');
Route::get('/anggotas/{id}/edit', [AnggotaController::class, 'edit'])->name('anggotas.edit');
Route::put('/anggotas/{id}', [AnggotaController::class, 'update'])->name('anggotas.update');
Route::delete('/anggotas/{id}', [AnggotaController::class, 'destroy'])->name('anggotas.destroy');
Route::get('/anggotas/search', [AnggotaController::class, 'search'])->name('anggotas.search');

Route::get('/bukus', [BukuController::class, 'index'])->name('bukus.index')->middleware('auth');
Route::get('/bukus/create', [BukuController::class, 'create'])->name('bukus.create');
Route::post('/bukus', [BukuController::class, 'store'])->name('bukus.store');
Route::get('/bukus/{id}', [BukuController::class, 'show'])->name('bukus.show');
Route::get('/bukus/{id}/edit', [BukuController::class, 'edit'])->name('bukus.edit');
Route::put('/bukus/{id}', [BukuController::class, 'update'])->name('bukus.update');
Route::delete('/bukus/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy');

Route::get('/raks', [RakController::class, 'index'])->name('raks.index')->middleware('auth');
Route::get('/raks/create', [RakController::class, 'create'])->name('raks.create');
Route::post('/raks', [RakController::class, 'store'])->name('raks.store');
Route::get('/raks/{id}', [RakController::class, 'show'])->name('raks.show');
Route::get('/raks/{id}/edit', [RakController::class, 'edit'])->name('raks.edit');
Route::put('/raks/{id}', [RakController::class, 'update'])->name('raks.update');
Route::delete('/raks/{id}', [RakController::class, 'destroy'])->name('raks.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');