<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontedUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagerController;
use App\Models\FrontendUser;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


    //User Management Routs Start here
    Route::get('/registration',[UserController::class,'registration'])->name('user.registration');
    Route::post('/store',[UserController::class,'store'])->name('user.store');
    Route::post('/userlogin',[UserController::class,'login'])->name('user.login');
    Route::post('/userlogout',[UserController::class,'logout'])->name('user.logout');
    //User Management Routs Ends here

    //Frontend Page setup Routs Start here
    Route::get('/',[BaseController::class,'home'])->name('home');
    Route::get('/specialsOffer',[BaseController::class,'specialsOffer'])->name('specialsOffer');
    Route::get('/delivery',[BaseController::class,'delivery'])->name('delivery');
    Route::get('/contact_us',[BaseController::class,'contact'])->name('contact');
    Route::get('/cart',[BaseController::class,'cart'])->name('cart');
    Route::get('/product/{id}/details',[BaseController::class,'productView'])->name('product_details');
    //Frontend Page setup Routs Ends here

    //Cart store and show routs starts here
    Route::post('/cart/{id}/store',[CartController::class,'store'])->name('cart.store');
    Route::delete('/cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.delete');



// Admin Routes
Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function(){
    
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
    //Sub-Category Route Ends Here

    //Product manegement Route Start Here
    Route::get('/products',[ProductController::class,'index'])->name('product.list');
    Route::get('/products/add',[ProductController::class,'addNew'])->name('product.list.add');
    Route::post('/products/store',[ProductController::class,'store'])->name('product.list.store');
    Route::get('/products/{id}/details/add',[ProductController::class,'addDetails'])->name('product.list.addDetails');
    Route::post('/products/{id}/details/store',[ProductController::class,'detailsStore'])->name('product.list.detailsStore');
    Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/products/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/products/{id}/delete',[ProductController::class,'destroy'])->name('product.destroy');


    //User Manager Route Start
    Route::get('/user_list',[UserManagerController::class,'index'])->name('user.list');
    Route::delete('/user/{id}/delete',[UserManagerController::class,'delete'])->name('user.delete');

});




require __DIR__.'/auth.php';
