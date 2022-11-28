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


Route::get('/home', 'QuestionController@index')->name('questions.index');
Route::get('/', 'QuestionController@index')->name('questions.index');
Route::get('questions','QuestionController@index')->name('questions.index');
//article create new
Route::get('questions/create','QuestionController@create')->name('questions.create');
Route::put('questions','QuestionController@store')->name('questions.store');
//article edit existing
Route::get('questions/{id}/edit','QuestionController@edit')->name('questions.edit');
Route::patch('questions/{id}','QuestionController@update')->name('questions.update');
//article show one
Route::get('questions/{id}','QuestionController@show')->name('questions.show');
//article delete
Route::delete('questions/{id}','QuestionController@destroy')->name('questions.delete');
//vote
Route::post('questions/vote','QuestionController@vote')->name('questions.vote');

//article search
Route::get('search/questions', 'SearchController@userList')->name('questions.search');


//notifications
Route::resource('notifications', 'NotificationController');


//article reply routes
Route::put('replies/create','ReplyController@store')->name('replies.store');
Route::delete('replies/delete','ReplyController@destroy')->name('replies.delete');
Route::patch('replies','ReplyController@update')->name('replies.update');
Route::put('replies/nested','ReplyController@storenested')->name('replies.nested');

//image routes
Route::post('images/store','ImageController@store')->name('images.store');

