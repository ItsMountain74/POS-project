<?php

use App\Http\Controllers\AttendController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::resource('/products', ProductController::class);
Route::get('/newOrder', [OrdersController::class, 'getProd'])->middleware('auth');
Route::get('/viewOrders', [OrdersController::class, 'show'])->middleware('auth');
Route::post('/newOrder/store', [OrdersController::class, 'placeOrder'])->middleware('auth');
Route::post('order/print', [OrdersController::class, 'printOrder'])->middleware('auth');

Route::get('/CheckInOut/{id}', [AttendController::class,'index'])->middleware('auth')->name('CheckInOut');
Route::post('/checkIn/{id}', [AttendController::class, 'check_in']);
Route::post('/checkOut/{id}', [AttendController::class, 'check_out'])->middleware('auth')->name('check_out');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
