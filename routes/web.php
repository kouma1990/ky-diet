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

Route::get('/', 'PublicController@showTop');
Route::get('/help', 'PublicController@showHelp');

Auth::routes();

Route::post('/diet-data', 'HomeController@createDietData');

Route::get('/home', 'HomeController@index');
Route::get('/home/room_list', 'HomeController@showRoomList');
Route::post('/home/setting', 'HomeController@modifySetting');

Route::get('/room/{id}', 'RoomController@showRoom');
Route::post('/room', 'RoomController@createRoom');
Route::delete('/room/{id}', 'RoomController@deleteRoom');

Route::post('/room-invitation', 'RoomInvitationController@createRoomInvitation');
Route::patch('/room-invitation/{id}', 'RoomInvitationController@processRoomInvitation');

Route::get('/test', function() {
    return "test";
});