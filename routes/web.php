<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', 'BlogController@index');
Auth::routes();
//membuat route jika belum login maka route yang ada dalam route group tidak bisa diakses
Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');
    //ini merupkann standar route di laravel agar CRUD yang kedepannya lebih mudah dilakukan
    //cek hasil dengan php artisan route:list   
    Route::resource('/category','CategoryController');

    //tgas
    Route::resource('/tag', 'TagController');

    //route trash sampah
    Route::get('/post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/delete/{id}', 'PostController@delete_trash')->name('post.delete_trash');
    //post
    Route::resource('/post', 'PostController');

    //user
    Route::resource('user', 'UserController');
    
});






