<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;

// Admin Routes

Route::controller(AdminController::class)->prefix('admin')->group(function(){

    Route::get('/login', 'index')->name('login_form') ;
    Route::post('/login/owner', 'AdminLogin')->name('admin.login') ;
    Route::get('/logout', 'AdminLogout')->name('admin.logout') ;
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard')->middleware('admin');

    Route::get('/register', 'AdminRegister')->name('admin.register'); 
    Route::post('/register', 'CreateAdmin'); 
       
});

// End Admin Routes


// Seller Routes

Route::controller(SellerController::class)->prefix('seller')->group(function(){

    Route::get('/login', 'index')->name('seller_login_form') ;
    Route::post('/login/seller', 'SellerLogin')->name('seller.login') ;
    Route::get('/logout', 'SellerLogout')->name('seller.logout') ;
    Route::get('/dashboard', 'dashboard')->name('seller.dashboard')->middleware('seller');

    Route::get('/register', 'SellerRegister')->name('seller.register'); 
    Route::post('/register', 'CreateAdmin'); 
       
});


//End Seller Routes




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
