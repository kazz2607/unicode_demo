<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Mechanics;
use App\Models\Country;
use App\Models\Categories;
use App\Models\PostModel;
use App\Models\UsersModel;
use App\Models\GroupsModel;

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
Route::prefix('demo')->group(function(){
    Route::get('/owner', function () {
        $owner = Mechanics::find(1)->carOwner;
        dd($owner);
    });
    
    Route::get('/country', function () {
        $posts = Country::find(2)->posts;
        dd($posts);
    });
    
    Route::get('/posts', function () {
        $categories = PostModel::find(6)->categories;
        dd($categories);
    });
    
    Route::get('/categories', function () {
        //$posts = Categories::find(1)->posts;
        $categories = PostModel::find(6)->categories;
        foreach ( $categories as $cartegory){
            // if (!empty($cartegory->pivot->create_at)){
            //     echo $cartegory->pivot->create_at.'</br>';
            // };
            //dd($cartegory->pivot);
            echo $cartegory->pivot->post_id.' - ';
            echo $cartegory->pivot->status.'</br>';
        };
    });
    
    Route::get('/phone', function () {
        $phone = UsersModel::find(7)->phone;
        dd($phone);
    });
    
    Route::get('/users', function () {
        $users = GroupsModel::find(1);
        $users = $users->users()->where('id', '>', 5)->get();
        dd($users);
    });
    
    Route::get('/group', function () {
        // $group = UsersModel::find(5)->group;
        // dd($group);
    
        $users = UsersModel::all();
        foreach ($users as $user){
            if(!empty($user->group->name)){
                $groupName = $user->group->name;
                $userName = $user->name;
                echo $userName.' - '.$groupName.'</br>';
            }else{
                $userName = $user->name;
                echo $userName.' - Không có nhóm </br>';
            }
        }
    });

    Route::get('/comments', function () {
        // DB::enableQueryLog();
        // $post = PostModel::whereHas('comments', function($query){
        //         $query->whereNotNull('image');
        // })->get();
        
        // $post = PostModel::doesntHave('comments')->get();

        // $post = PostModel::whereDoesntHave('comments', function($query){
        //     $query->whereNull('image');
        // })->get();

        // $post = PostModel::withCount('comments')->get();
        // foreach($post as $item){
        //     echo $item->title.' - '.$item->comments_count.'</br>';
        // }

        // $post = PostModel::withCount(['comments','votes' => function($query){
        //     $query->where('value','>', 4);
        // }])->get();

        $post = PostModel::withCount(['comments','votes as likes' => function($query){
            $query->where('value','>', 4);
        }])->get();

        // dd(DB::getQueryLog());
        dd($post);
    });

});
