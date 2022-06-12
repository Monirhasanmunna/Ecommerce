<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;




Route::get('/',[BaseController::class,'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
