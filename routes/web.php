<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;




Route::get('/',[BaseController::class,'home'])->name('home');
Route::get('/specialsOffer',[BaseController::class,'specialsOffer'])->name('specialsOffer');
Route::get('/delivery',[BaseController::class,'delivery'])->name('delivery');
Route::get('/contact_us',[BaseController::class,'contact'])->name('contact');
Route::get('/cart',[BaseController::class,'cart'])->name('cart');
Route::get('/product_details',[BaseController::class,'productView'])->name('product_details');

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
