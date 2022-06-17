<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

    // Category Routes Start here
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.list');
    Route::get('/categories_add',[CategoryController::class,'addNew'])->name('categories.add');
    Route::post('/categories_store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{id}/update',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/{id}/delete',[CategoryController::class,'destroy'])->name('categories.destroy');
    // Category Routes Ends here

    //Sub-Category Route Start Here
    Route::get('/sub_categories',[SubCategoryController::class,'index'])->name('subcategories.list');
    Route::get('/sub_categories/add',[SubCategoryController::class,'addNew'])->name('subcategories.add');
    Route::post('/sub_categories/store',[SubCategoryController::class,'store'])->name('subcategories.store');
    Route::get('/sub_categories/{id}/edit',[SubCategoryController::class,'edit'])->name('subcategories.edit');
    Route::put('/sub_categories/{id}/update',[SubCategoryController::class,'update'])->name('subcategories.update');
    Route::delete('/sub_categories/{id}/delete',[SubCategoryController::class,'destroy'])->name('subcategories.destroy');


});




require __DIR__.'/auth.php';
