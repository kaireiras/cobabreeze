<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/hello', function(){
    return "halo, ini halaman percobaan route";
});

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/admin', function(){
    return "halaman admin";
}) -> middleware(['auth', 'isAdmin']);

Route::get('/admin/jobs', function(){
    return "halaman ini hanya bisa diakses oleh admin";
})->middleware('isAdmin');

require __DIR__.'/auth.php';
