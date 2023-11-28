<?php

use App\Http\Controllers\ProdukController;
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

Route::get('/', [ProdukController::class, 'index'])->name('index');
Route::get('/tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/tambah-produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/edit-produk/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/edit-produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/delete-produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
