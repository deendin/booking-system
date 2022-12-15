<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ApprovedBookingController;


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

Route::get('/', [BookingController::class, 'create'])->name('booking.index');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// ADMIN ROUTES
Route::post('/admin/auth/login', [AdminController::class, 'login'])->name('admin.auth.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(
    function () {
        // admin routes -> /admin/{route}
        Route::get('login', [AdminController::class, 'index'])->name('login');

        // admin/bookings -> /admin/bookings/{route}
        Route::middleware('auth', 'admin')->prefix('bookings')->group(
            function () {
                Route::get('/', [AdminBookingController::class, 'index'])->name('booking.index');
                Route::get('/edit/{uuid}', [AdminBookingController::class, 'edit'])->name('booking.edit');
                Route::post('/update/{booking}', [AdminBookingController::class, 'update'])->name('booking.update');
                Route::get('/destroy/{booking}', [AdminBookingController::class, 'destroy'])->name('booking.destroy');
                Route::get('/approve/{uuid}', [ApprovedBookingController::class, 'approve'])->name('booking.approve_booking');
                Route::get('/approved', [ApprovedBookingController::class, 'index'])->name('booking.approved');
            }
        );
        
    }
);
