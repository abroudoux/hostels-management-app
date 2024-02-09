<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HostelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // AUTH
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // HOSTELS
    Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
    Route::get('/hostel', [HostelController::class, 'create'])->name('hostels.create');
    Route::post('/hostel', [HostelController::class, 'store'])->name('hostels.store');
    Route::get('/hostel/{id}/edit', [HostelController::class, 'edit'])->name('hostels.edit');
    Route::put('/hostel/{id}/update', [HostelController::class, 'update'])->name('hostels.update');
    Route::delete('/hostel', [HostelController::class, 'destroy'])->name('hostels.destroy');
});

require __DIR__.'/auth.php';
