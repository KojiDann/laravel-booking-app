<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Services\BookingUsageService;
use Illuminate\Support\Facades\File;

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

Route::get('/homepage', function (BookingUsageService $service) {
    $overview = File::get(resource_path('content/overview.txt'));

    $usage = $service->currentUsage(3);

    return view('homepage', [
        'overview' => $overview,
        'currentCount' => $usage['currentCount'],
        'capacity' => $usage['capacity'],
        'isFull' => $usage['isFull'],
    ]);
})->name('homepage');


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

Route::get('/schedules', [ScheduleController::class, 'index'])->middleware(['auth', 'verified'])->name('schedules.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->middleware(['auth', 'verified'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->middleware(['auth', 'verified'])->name('schedules.store');
Route::post('/schedules/oneday', [ScheduleController::class, 'onedayStore'])->middleware(['auth', 'verified'])->name('schedules.onedayStore');
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->middleware(['auth', 'verified'])->name('schedules.edit');
Route::patch('/schedules/{schedule}', [ScheduleController::class, 'update'])->middleware(['auth', 'verified'])->name('schedules.update');
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'cancel'])->middleware(['auth', 'verified'])->name('schedules.cancel');

Route::get('/bookings', [BookingController::class, 'index'])->middleware(['auth', 'verified'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->middleware(['auth', 'verified'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->middleware(['auth', 'verified'])->name('bookings.store');
Route::post('/bookings/oneday', [BookingController::class, 'onedayStore'])->middleware(['auth', 'verified'])->name('bookings.onedayStore');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->middleware(['auth', 'verified'])->name('bookings.edit');
Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->middleware(['auth', 'verified'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'cancel'])->middleware(['auth', 'verified'])->name('bookings.cancel');


Route::get('/schedules/calendar', function () {
    return view('schedules.calendar');
});
