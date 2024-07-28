<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Nhac_Si_Controller;
use App\Http\Controllers\SachController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\NhacSiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::any('/', function () {
    return redirect()->route("login");
});

// DAY02
// Tạo controller: php artisan make:controller SanPhamController
// Route::get("/san-pham",[SanPhamController::class,"list"])->name("san-pham.list");
// Route::get("/san-pham/{id}",[SanPhamController::class,'detail'])->name("san-pham.detail");
// Route::get("san-pham/sua/{id}",[SanPhamController::class,'edit'])->name('san-pham.edit');
// Route::get("/san-pham/xoa/{id}",[SanPhamController::class,'delete'])->name('san-pham.delete');

// //Route NhacSi
// Route::get('/nhacSi',[NhacSiController::class,'index'])->name('nhacSi.index');
// Route::get('/nhacSi/create',[NhacSiController::class,'create'])->name('nhacSi.create');
// Route::get('/nhacSi/edit/{id}',[NhacSiController::class,'edit'])->name('nhacSi.edit');
// Route::get('/nhacSi/detail/{id}',[NhacSiController::class,'show'])->name('nhacSi.show');
// Route::post('/nhacSi/store',[NhacSiController::class,'store'])->name('nhacSi.store');
// Route::patch('/nhacSi/update/{id}',[NhacSiController::class,'update'])->name('nhacSi.update');
// Route::delete('/nhacSi/delete/{id}',[NhacSiController::class,'destroy'])->name('nhacSi.destroy');

// //Route Sach
// Route::get('/sach',[SachController::class,'index'])->name('sach.index');
// Route::get('/sach/create',[SachController::class,'create'])->name('sach.create');
// Route::get('/sach/edit/{id}',[SachController::class,'edit'])->name('sach.edit');
// Route::get('/sach/detail/{id}',[SachController::class,'show'])->name('sach.show');
// Route::post('/sach/store',[SachController::class,'store'])->name('sach.store');
// Route::patch('/sach/update/{id}',[SachController::class,'update'])->name('sach.update');
// Route::delete('/sach/delete/{id}',[SachController::class,'destroy'])->name('sach.destroy');

// Route::resource('students',StudentController::class);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::get('adminHome', [UserController::class, 'index'])->name('adminHome')->middleware('isAdmin');
Route::get('userCreate', [UserController::class, 'create'])->name('userCreate')->middleware('isAdmin');
Route::post('userCreate', [UserController::class, 'store'])->name('store')->middleware('isAdmin');
Route::get('userEdit/{id}', [UserController::class, 'edit'])->name('userEdit')->middleware('isAdmin');
Route::patch('userEdit/{id}', [UserController::class, 'update'])->name('update')->middleware('isAdmin');
Route::delete('destroyUser/{id}', [UserController::class, 'destroy'])->name('userDelete')->middleware('isAdmin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');