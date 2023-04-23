<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RgisterController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('home');
});
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/users/{user}/posts',[UserPOSTController::class,'show'])->name('user.posts');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/loginauth',[LoginController::class,'store']);




Route::get('/register',[RgisterController::class,'index']);
Route::post('/auth',[RgisterController::class,'store']);



Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/post',[PostController::class,'store']);
Route::delete('/posts/{post}/delete_posts',[PostController::class,'delete']);


Route::post('/post/{post}/likes',[PostLikeController::class,'store']);
Route::delete('/post/{post}/delete_likes',[PostLikeController::class,'delete']);




Route::post('/logout',[LogoutController::class,'logoutauth']);