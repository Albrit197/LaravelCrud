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


// Route::get('/LaravelCrud/posts', 'BlogPostController@index');
Route::get('/LaravelCrud/posts', 'BlogPostController@index')->name('posts.index');
Route::get('/LaravelCrud/posts/{id}', 'BlogPostController@show');
Route::post('/LaravelCrud/posts', 'BlogPostController@store')->name('posts.store');
Route::delete('/LaravelCrud/posts/{id}', 'BlogPostController@destroy')->name('posts.destroy');


Route::get('/LaravelCrud/', function () {
    return view('welcome');
})->name('index');

Route::get('/LaravelCrud/about', function() {
    return view('about');
})->name('about');



