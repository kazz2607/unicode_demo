<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Route;

use App\Models\Mechanics;

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
    /** Route Users */
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UsersController::class,'index'])->name('index');
        Route::get('/create',[UsersController::class,'create'])->name('create');
        Route::get('/store',[UsersController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UsersController::class,'edit'])->name('edit');
        Route::get('/update',[UsersController::class,'update'])->name('update');
        Route::get('/delete/{id}',[UsersController::class,'delete'])->name('delete');
        Route::get('/relation',[UsersController::class,'relations'])->name('relation');
    });
    /** Route Posts */
    Route::prefix('posts')->name('posts.')->group(function(){
        Route::get('/',[PostController::class,'index'])->name('index');
        Route::get('/create',[PostController::class,'create'])->name('create');
        Route::get('/store',[PostController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit');
        Route::get('/update',[PostController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PostController::class,'delete'])->name('delete');
        Route::post('/delete-any',[PostController::class,'handleDeleteAny'])->name('delete-any');
        Route::get('/restore/{id}',[PostController::class,'restore'])->name('restore');
        Route::get('/force-delete/{id}',[PostController::class,'forceDelete'])->name('force-delete');
    });
});

Route::get('/owner', function () {
    $owner = Mechanics::find(1)->carOwner;
    dd($owner);
    //return $owner;
});
