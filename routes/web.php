<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Route::get('/',[BaseController::class,'home'])->name('home');
Route::get('/specialsOffer',[BaseController::class,'specialsOffer'])->name('specialsOffer');
Route::get('/delivery',[BaseController::class,'delivery'])->name('delivery');
Route::get('/contact_us',[BaseController::class,'contact'])->name('contact');
Route::get('/cart',[BaseController::class,'cart'])->name('cart');
Route::get('/product_details',[BaseController::class,'productView'])->name('product_details');

// Admin Routes
Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth']],function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.list');
    Route::get('/categories_add',[CategoryController::class,'addNew'])->name('categories.add');
    Route::post('/categories_store',[CategoryController::class,'store'])->name('categories.store');
});




require __DIR__.'/auth.php';
