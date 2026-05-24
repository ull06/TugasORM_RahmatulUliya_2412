<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController; // Ini wajib ada agar Laravel kenal Controllernya

// Route::get('/', function () {
//     return view('welcome');
// });

// // Route untuk menampilkan halaman menu 
// Route::get('/menu-kopi', [MenuController::class, 'index']);

// Halaman Utama untuk Pelanggan
Route::get('/', [MenuController::class, 'index']);

// Halaman Dashboard Admin (Untuk Lihat Tabel Menu)
Route::get('/admin', [MenuController::class, 'admin']);

// Halaman Form Tambah Menu
Route::get('/admin/tambah', [MenuController::class, 'create']);

// Proses Simpan Menu
Route::post('/admin/simpan', [MenuController::class, 'store']);

// Fitur Hapus Menu (Biar makin lengkap!)
Route::get('/admin/hapus/{id}', [MenuController::class, 'delete']);

// Route untuk nampilin halaman form edit (ambil data lama)
Route::get('/admin/edit/{id}', [MenuController::class, 'edit']);

// Route untuk proses simpan perubahannya (pake POST)
Route::post('/admin/update/{id}', [MenuController::class, 'update']);