<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AnswerApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api\V1')->middleware(['auth:sanctum'])->group(function () {
    Route::get('questions/{question}/answers','QuestionApiController@answers')->name('api.questions.answers');
    Route::post('questions/{question}/answers','QuestionApiController@storeAnswer')->name('api.questions.answers.store');

    Route::put('answers/create','AnswerApiController@store')->name('api.answers.store');
    Route::delete('answers/delete','AnswerApiController@destroy')->name('api.answers.delete');
    Route::patch('answers','AnswerApiController@update')->name('api.answers.update');
    Route::put('answers/nested','AnswerApiController@storenested')->name('api.answers.nested');

    Route::resource('votes','VoteApiController');
});
