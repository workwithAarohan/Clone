<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{user}','App\Http\Controllers\PostController@index')->name('user.profile');
Route::patch('/profileimg/{profile}/','App\Http\Controllers\ProfileController@update_profilepic')->name('user.updateimage');

Route::resources([
    '/post'=> App\Http\Controllers\PostController::class,
]);
Route::get('/profile/{user}/saved','App\Http\Controllers\PostController@saved')->name('posts.saved');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
