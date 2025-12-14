<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/mypage', function () {
    return view('mypage');
})->middleware(['auth', 'verified'])->name('mypage');

Route::get('/rooms', [RoomController::class, 'index'])->middleware(['auth', 'verified'])->name('rooms.index');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/schedules/index', [ScheduleController::class, 'index'])->middleware(['auth', 'verified'])->name('schedules.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->middleware(['auth', 'verified'])->name('schedules.create');
Route::post('/schedules/create', [ScheduleController::class, 'store'])->middleware(['auth', 'verified'])->name('schedules.store');
Route::get('/schedules/{id}/edit', [ScheduleController::class, 'edit'])->middleware(['auth', 'verified'])->name('schedules.edit');
Route::patch('/schedules/{id}', [ScheduleController::class, 'update'])->middleware(['auth', 'verified'])->name('schedules.update');
Route::delete('/schedules/{id}', [ScheduleController::class, 'cancel'])->middleware(['auth', 'verified'])->name('schedules.cancel');

