<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| My Notes Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [NoteController::class, 'index'])
    ->name('notes.index');

// Simpan catatan baru
Route::post('/store', [NoteController::class, 'store'])
    ->name('notes.store');

// Halaman edit
Route::get('/edit/{id}', [NoteController::class, 'edit'])
    ->name('notes.edit');

// Proses update
Route::put('/update/{id}', [NoteController::class, 'update'])
    ->name('notes.update');

// Hapus catatan
Route::delete('/delete/{id}', [NoteController::class, 'destroy'])
    ->name('notes.destroy');