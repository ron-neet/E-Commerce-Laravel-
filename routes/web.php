<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('login');
})->middleware('UserAuth');

Route::post('/login', [UserController::class, 'login']); 
Route::get('/', [ProductController::class, 'index']);
Route::get('/detail/{id}', [ProductController::class, 'details']);
Route::get('/search', [ProductController::class, 'search']);
Route::post("/addtocart", [ProductController::class, 'addtocart'])->name('addtocart');
Route::get("/cartlist", [ProductController::class, 'cartlist']);
Route::get("/removecart/{id}", [ProductController::class, 'removecart']);
Route::get("/ordernow", [ProductController::class, 'ordernow']);
Route::post("/orderplace", [ProductController::class, 'orderplace']);
Route::get("/orderlist", [ProductController::class, 'orderlist']);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminProductController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/products', AdminProductController::class);
});