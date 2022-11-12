<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeDetailController;
use App\Http\Controllers\Admin\EmployeeContactController;
use App\Http\Controllers\Employee\EmployeeAttendenceController;


// Admin Routes

Route::controller(AdminController::class)->prefix('admin')->group(function(){

    Route::get('/login', 'index')->name('login_form') ;
    Route::post('/login/owner', 'adminLogin')->name('admin.login') ;
    Route::get('/logout', 'adminLogout')->name('admin.logout') ;
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard')->middleware('admin');

    Route::get('/register', 'AdminRegister')->name('admin.register'); 
    Route::post('/register', 'CreateAdmin'); 
       
});

// End Admin Routes


// Employee Routes

Route::controller(EmployeeController::class)->prefix('employee')->group(function(){

    Route::get('/login', 'index')->name('employee_login_form') ;
    Route::post('/login', 'employeeLogin')->name('employee.login') ;
    Route::get('/logout', 'employeeLogout')->name('employee.logout') ;
    Route::get('/dashboard', 'dashboard')->name('employee.dashboard')->middleware('employee');
    Route::post('/store', 'storeEmployee')->name('store.employee');
    Route::get('/edit/{id}', 'editEmployee')->name('edit.employee');
    Route::post('/update/{id}', 'updateEmployee')->name('update.employee');
    Route::get('/delete/{id}', 'deleteEmployee');
    Route::get('/filter', 'employeeFilter')->name('employee.filter');
    Route::post('/filter/attedence' , 'filterEmployeeAttendence')->name('dataFilter');

    // Route::get('/register', 'SellerRegister')->name('seller.register'); 
    // Route::post('/register', 'CreateAdmin'); 
       
});

Route::controller(EmployeeDetailController::class)->prefix('employee-details')->group( function () {

    Route::get('/', 'show')->name('show.employee.detail');
    Route::get('/create', 'createEmployeeDetail')->name('create.employee.detail');
    Route::post('/store', 'storeEmployeeDetail')->name('store.employee.detail');
    Route::get('{id}/edit', 'editEmployeeDetail');
    Route::post('{id}/update', 'updateEmployeeDetail')->name('update.employee.detail');
    Route::get('{id}/delete', 'deleteEmployeeDetail');
});


Route::controller(EmployeeContactController::class)->prefix('employee-contacts')->group( function () {

    Route::get('/', 'show')->name('show.employee.contact');
    Route::get('/create', 'createEmployeeContact')->name('create.employee.contact');
    Route::post('/store', 'storeEmployeeContact')->name('store.employee.conatct');
    Route::get('/{id}/edit', 'editEmployeeContact');
    Route::post('/{id}/update', 'updateEmployeeContact')->name('update.employee.conatct');
    Route::get('/{id}/delete', 'deleteEmployeeContact');
});


Route::controller(EmployeeAttendenceController::class)->prefix('employee-attendences')->group( function () {

    Route::post('/store', 'storeEmployeeAttendence')->name('store.employee.attendence');
    Route::get('/edit/{id}', 'editEmployeeAttendence')->name('edit.employee');
    Route::post('/update/{id}', 'updateEmployeeAttendence')->name('update.employee');
    
});




Route::get('/', function () {
    return view('employee.auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
