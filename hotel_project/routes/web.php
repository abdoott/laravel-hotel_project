<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
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


Route::get('/',[AdminController::class,'home']);


route::get('/home',[AdminController::class,'index'])->name('home');

route::get('/create_room',[AdminController::class,'create_room'])
->middleware(['auth','admin']);

route::post('/add_room',[AdminController::class,'add_room'])
->middleware(['auth','admin']);

route::get('/view_room',[AdminController::class,'view_room'])
->middleware(['auth','admin']);

route::get('/room_delete/{id}',[AdminController::class,'room_delete'])
->middleware(['auth','admin']);

route::get('/room_update/{id}',[AdminController::class,'room_update'])
->middleware(['auth','admin']);

route::post('/edit_room/{id}',[AdminController::class,'edit_room'])
->middleware(['auth','admin']);

route::get('/room_details/{id}',[HomeController::class,'room_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

route::get('/boookings',[AdminController::class,'boookings'])
->middleware(['auth','admin']);

route::get('/booking_delete/{id}',[AdminController::class,'booking_delete'])
->middleware(['auth','admin']);

route::get('/approve_booking/{id}',[AdminController::class,'approve_booking'])
->middleware(['auth','admin']);

route::get('/reject_booking/{id}',[AdminController::class,'reject_booking'])
->middleware(['auth','admin']);

route::get('/gallary_view',[AdminController::class,'gallary_view'])
->middleware(['auth','admin']);

route::post('/upload_gallary',[AdminController::class,'upload_gallary'])
->middleware(['auth','admin']);

route::get('/delete_gallary/{id}',[AdminController::class,'delete_gallary'])
->middleware(['auth','admin']);

route::post('/contact_us',[HomeController::class,'contact_us']);

route::get('/messages',[AdminController::class,'messages'])
->middleware(['auth','admin']);

route::get('/send_mail/{id}',[AdminController::class,'send_mail'])
->middleware(['auth','admin']);

route::post('/mail/{id}',[AdminController::class,'mail'])
->middleware(['auth','admin']);

route::get('/our_rooms',[HomeController::class,'our_rooms']);

route::get('/gallery_',[HomeController::class,'gallery_']);

route::get('/contact_us',[HomeController::class,'contact']);

route::get('/about_us',[HomeController::class,'about_us']);

Route::get('/unread-messages', [AdminController::class, 'countUnreadMessages']);

Route::post('/mark-message-as-read/{id}', [AdminController::class, 'markAsRead']);

Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');