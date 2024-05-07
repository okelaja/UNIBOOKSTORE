<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerbitController;

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
    return view('master.app');
});

Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [PenerbitController::class, 'store']) ->name('penerbit.store');
Route::get('/penerbit/show/{id}', [PenerbitController::class, 'show']) ->name('penerbit.show');
Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']) ->name('penerbit.edit');
Route::put('/penerbit/update/{id}', [PenerbitController::class, 'update']) ->name('penerbit.update');
Route::get('/penerbit/delete/{id}', [PenerbitController::class, 'destroy']) ->name('penerbit.delete');


Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store']) ->name('buku.store');
Route::get('/buku/show/{id}', [BukuController::class, 'show']) ->name('buku.show');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']) ->name('buku.edit');
Route::put('/buku/update/{id}', [BukuController::class, 'update']) ->name('buku.update');
Route::get('/buku/delete/{id}', [BukuController::class, 'destroy']) ->name('buku.delete');

