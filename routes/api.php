<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ReplyApiController;
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
    Route::put('replies/create','ReplyApiController@store')->name('api.replies.store');
    Route::delete('replies/delete','ReplyApiController@destroy')->name('api.replies.delete');
    Route::patch('replies','ReplyApiController@update')->name('api.replies.update');
    Route::put('replies/nested','ReplyApiController@storenested')->name('api.replies.nested');

    Route::resource('votes','VoteApiController');
});
