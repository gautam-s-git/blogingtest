<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
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

//All the Application Authection route is listted here;
Route::group(['prefix'=>'user','as'=>'user.'],function(){
    Route::get('register',[AuthenticationController::class,'registertaionPage'])->name('register');
    Route::post('signup',[AuthenticationController::class,'registerUser'])->name('signup');
    Route::get('login',[AuthenticationController::class,'loginPage'])->name('login');
    Route::post('signin',[AuthenticationController::class,'loginUser'])->name('signin');
    Route::get('signout',[AuthenticationController::class,'logoutUser'])->name('signout');
});

//All Application  Post Related Route Listed Here;

Route::group(['prefix'=>'post','middleware'=>'verifyuser','as'=>'post.'],function(){
    Route::get('create',[PostController::class,'create'])->name('create');
    Route::post('store',[PostController::class,'store'])->name('store');
    Route::get('list',[PostController::class,'list'])->name('list');
    Route::get('view/{slug}',[PostController::class,'view'])->name('view');
    Route::get('edit/{slug}',[PostController::class,'edit'])->name('edit');
    Route::post('update/{slug}',[PostController::class,'update'])->name('update');
    Route::get('delete/{slug}',[PostController::class,'delete'])->name('delete');
    Route::post('add/comment/{slug}',[PostController::class,'addComment'])->name('add.comment');
});
