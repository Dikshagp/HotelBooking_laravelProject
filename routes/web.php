<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});  */

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});    */


Route::get('/', [AdminController::class, 'home']);

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room'])->middleware(['auth','admin']);
Route::post('/add_room', [AdminController::class, 'add_room'])->middleware(['auth','admin']);

Route::get('/view_rooms', [AdminController::class, 'view_rooms'])->middleware(['auth','admin']);

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->middleware(['auth','admin']);

Route::get('/update_room/{id}', [AdminController::class, 'update_room'])->middleware(['auth','admin']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware(['auth','admin']);


Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth','admin']);
Route::get('/delete_bookings/{id}', [AdminController::class, 'delete_bookings'])->middleware(['auth','admin']);

Route::get('/approve_bookings/{id}', [AdminController::class, 'approve_bookings'])->middleware(['auth','admin']);
Route::get('/reject_bookings/{id}', [AdminController::class, 'reject_bookings'])->middleware(['auth','admin']);

Route::get('/view_gallary', [AdminController::class, 'view_gallary'])->middleware(['auth','admin']);

Route::post('/upload_gallary',[AdminController::class,'upload_gallary'])->middleware(['auth','admin']);

Route::get('/delete_image/{id}',[AdminController::class, 'delete_image'])->middleware(['auth','admin']);


Route::post('/contact_details',[HomeController::class, 'contact_details']);

Route::get('/contact_messages', [AdminController::class, 'contact_messages'])->middleware(['auth','admin']);

Route::get('/send_email/{id}',[AdminController::class, 'send_email'])->middleware(['auth','admin']);
Route::post('/mail/{id}',[AdminController::class, 'mail'])->middleware(['auth','admin']);

Route::get('/our_room',[HomeController::class,'our_room']);
Route::get('/hotel_gallary',[HomeController::class,'hotel_gallary']);
Route::get('/hotel_contact',[HomeController::class,'hotel_contact']);


Route::get('/admin_dashboard',[AdminController::class, 'admin_dashboard']);