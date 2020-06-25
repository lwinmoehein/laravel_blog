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
//home
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::get('articles','ArticleController@index')->name('articles.index');
//create new
Route::get('articles/create','ArticleController@create')->name('articles.create');
Route::put('articles','ArticleController@store')->name('articles.store');
//edit existing
Route::get('articles/{id}/edit','ArticleController@edit')->name('articles.edit');
Route::put('articles/{id}/edit','ArticleController@update');
//show one
Route::get('articles/{id}','ArticleController@show')->name('articles.show');
//ddelete
Route::delete('articles/{id}','ArticleController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
