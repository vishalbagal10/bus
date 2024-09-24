<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php

use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index'])->name('booking.index');
Route::post('/select-seats', [BookingController::class, 'selectSeats'])->name('booking.select_seats');
Route::post('/confirm-booking', [BookingController::class, 'confirmBooking'])->name('booking.confirm');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
