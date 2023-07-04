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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('posts.home');

Route::get('/home', [App\Http\Controllers\TaskController::class, 'showHomePage'])->name('posts.home');

Route::get('/home/create', 'TaskController@create')->name('posts.create');

Route::post('/home', 'TaskController@store')->name('posts.store');

Route::get('/home/{id}/edit', 'TaskController@edit')->name('posts.edit');