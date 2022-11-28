<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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
//article home
Auth::routes(['verify' => true]);


Route::get('/home', 'ArticleController@index')->name('articles.index');
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::get('articles','ArticleController@index')->name('articles.index');
//article create new
Route::get('articles/create','ArticleController@create')->name('articles.create');
Route::put('articles','ArticleController@store')->name('articles.store');
//article edit existing
Route::get('articles/{id}/edit','ArticleController@edit')->name('articles.edit');
Route::patch('articles/{id}','ArticleController@update')->name('articles.update');
//article show one
Route::get('articles/{id}','ArticleController@show')->name('articles.show');
//article delete
Route::delete('articles/{id}','ArticleController@destroy')->name('articles.delete');
//vote
Route::post('articles/vote','ArticleController@vote')->name('articles.vote');

//article search
Route::get('search/articles', 'SearchController@userList')->name('articles.search');


//notifications
Route::resource('notifications', 'NotificationController');


//article reply routes
Route::put('replies/create','ReplyController@store')->name('replies.store');
Route::delete('replies/delete','ReplyController@destroy')->name('replies.delete');
Route::patch('replies','ReplyController@update')->name('replies.update');
Route::put('replies/nested','ReplyController@storenested')->name('replies.nested');

//image routes
Route::post('images/store','ImageController@store')->name('images.store');

