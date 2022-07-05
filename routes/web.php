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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::resource('/rooms', 'RoomControllers');
Route::resource('/inns', 'InnController');
Route::resource('/room_rates', 'RoomRatesController');
Route::resource('/freebies', 'FreebiesController');
