<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (\Symfony\Component\HttpFoundation\Request $request) {
    return view('welcome');
});


Auth::routes();

Route::redirect('/', 'home');
Route::get('/home', 'HomeController@index')->name('home');
Route:: namespace('Admin')->prefix('/admin')->name('admin.')->group(function (){




    Route::prefix('/posts')->name('posts.')->group(function (){
        Route::get('/', 'PostsController@index')->name('index');
        Route::get('/{post}', 'PostsController@show')->name('show');
        Route::get('/create', 'PostsController@create')->name('create');
        Route::get('/store', 'PostsController@store')->name('store');
        Route::get('/{id}/edit', 'PostsController@edit')->name('edit');
        Route::put('/{id}/edit', 'PostsController@update')->name('update');
        Route::get('/{post}/delete', 'PostsController@delete')->name('delete');
        Route::get('/{post}/restore', 'PostsController@restore')->name('restore');

    });






});
Route:: namespace('Admin')->prefix('/admin')->as('admin.')->group(function (){
    Route::resource('users', 'UsersController');
});
Route:: namespace('Admin')->prefix('/admin')->as('admin.')->group(function (){
    Route::resource('categories', 'CategoriesController');
});
Route:: namespace('Admin')->prefix('/admin')->as('admin.')->group(function (){
    Route::resource('roles', 'RolesController');
});
