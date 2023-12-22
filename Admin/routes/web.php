<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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
Route::get('/admin_login',[Admin::class,'vadmin_login'])->name('admin/login');
Route::post('/admin_login', [Admin::class, 'admin_login'])->name('admin/checklogin');
Route::get('/admin_logout', [Admin::class, 'admin_logout'])->name('admin/logout');

Route::middleware('admin')->group(function(){
    Route::get('/',[Admin::class,'dashboard'])->name('admin/dashboard');
    
    Route::get('/employee',[Admin::class,'employee'])->name('admin/employee');
    
    Route::get('/add_employee',[Admin::class,'add_employee'])->name('admin/add/employee');
    
    Route::get('/edit_employee',[Admin::class,'edit_employee'])->name('admin/edit/employee');
    
    Route::get('/rooms',[Admin::class,'rooms'])->name('admin/rooms');
    
    Route::get('/add_rooms',[Admin::class,'add_rooms'])->name('admin/add/rooms');
    
    Route::get('/edit_rooms',[Admin::class,'edit_rooms'])->name('admin/edit/rooms');
    
    Route::get('/room_type',[Admin::class,'room_type'])->name('admin/room_type');
    
    Route::get('/add_room_type',[Admin::class,'add_room_type'])->name('admin/add/room_type');
    
    Route::get('/edit_room_type',[Admin::class,'edit_room_type'])->name('admin/edit/room_type');
    
    Route::get('/service',[Admin::class,'service'])->name('admin/service');
    
    Route::get('/add_service',[Admin::class,'add_service'])->name('admin/add/service');
    
    Route::get('/edit_service',[Admin::class,'edit_service'])->name('admin/edit/service');
    
    Route::get('/service_detail',[Admin::class,'service_detail'])->name('admin/service_detail');
    
    Route::get('/feedback',[Admin::class,'feedback'])->name('admin/feedback');
    
    Route::get('/booking',[Admin::class,'booking'])->name('admin/booking');
    
    Route::get('/booking_detail',[Admin::class,'booking_detail'])->name('admin/booking_detail');
    
});

