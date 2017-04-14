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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/diet-data', 'HomeController@createDietData');

Route::get('/room/{id}', 'RoomController@showRoom');
Route::post('/room', 'RoomController@createRoom');
Route::delete('/room{id}', 'RoomController@deleteRoom');

Route::post('/room-invitation', 'RoomInvitationController@createRoomInvitation');
Route::patch('/room-invitation/{id}', 'RoomInvitationController@modifyRoomInvitation');
Route::delete('/room-invitation/{id}', 'RoomInvitationController@deleteRoomInvitation');

