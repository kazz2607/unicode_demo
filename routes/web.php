<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UsersController::class,'index'])->name('index');
        Route::get('/create',[UsersController::class,'create'])->name('create');
        Route::get('/store',[UsersController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UsersController::class,'edit'])->name('edit');
        Route::get('/update',[UsersController::class,'update'])->name('update');
        Route::get('/delete/{id}',[UsersController::class,'delete'])->name('delete');
    });
});
