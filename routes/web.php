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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/saveSertifikat', 'HomeController@saveSertifikat')->name('saveSertifikat');
Route::get('/editSertfikat/{id}/', 'HomeController@editSertifikat')->name('editSertifikat');
Route::get('/viewSertfikat/{id}/', 'HomeController@viewSertifikat')->name('viewSertifikat');
Route::post('/updateSertifikat', 'HomeController@updateSertifikat')->name('updateSertifikat');
Route::delete('/home/deleteSertifikat/{id}', 'HomeController@deleteSertifikat')->name('deleteSertifikat');


