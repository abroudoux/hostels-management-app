<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

const HOSTEL = 'hostel';
const ROOM = 'room';
const PROFILE = 'profile';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // AUTH
    Route::get(PROFILE, [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch(PROFILE, [ProfileController::class, 'update'])->name('profile.update');
    Route::delete(PROFILE, [ProfileController::class, 'destroy'])->name('profile.destroy');

    // HOSTELS
    Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
    Route::get('/hostel/{id}', [HostelController::class, 'show'])->name('hostels.show');
    Route::get(HOSTEL, [HostelController::class, 'create'])->name('hostels.create');
    Route::post(HOSTEL, [HostelController::class, 'store'])->name('hostels.store');
    Route::get('/hostel/{id}/edit', [HostelController::class, 'edit'])->name('hostels.edit');
    Route::put('/hostel/{id}/update', [HostelController::class, 'update'])->name('hostels.update');
    Route::delete(HOSTEL, [HostelController::class, 'destroy'])->name('hostels.destroy');

    // ROOMS
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/room/{id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get(ROOM, [RoomController::class, 'create'])->name('rooms.create');
    Route::post(ROOM, [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/room/{id}/update', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete(ROOM, [RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::post('/room/{id}/reserve/{user_id}', [RoomController::class, 'reserve'])->name('rooms.reserve');
});

require __DIR__.'/auth.php';
