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

//login
Route::post('/','LoginController@store')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

//admin
Route::get('/admin', 'AdminController@index')->name('admindashboard');

//rentalsubsale
Route::get('/rental', 'RentalController@index')->name('allrentals');
Route::get('/rental/add', 'RentalController@addrental')->name('addrental');
Route::get('/rental/listmoenth', 'RentalController@listmonth')->name('listmonth');
Route::get('/rental/month/{month}/{year}', 'RentalController@getmonth')->name('getmonth');

//member
Route::get('/user', 'UserController@index')->name('allagents');
Route::get('/user/add', 'UserController@addagent')->name('addagent');
Route::post('/user/store', 'UserController@store')->name('storeagent');
Route::get('/user/details/{id}', 'UserController@show')->name('detailsagent');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update/{id}', 'UserController@update')->name('updateagent');
Route::get('/user/delete/{id}', 'UserController@destroy');
Route::get('/user/downline/{id}', 'UserController@downline')->name('downlineagent');
Route::post('/user/updategop/{id}', 'UserController@updategop')->name('updategop');

//Project admin
Route::get('/project', 'ProjectController@index')->name('admindashboardproject');

//agent
Route::get('/agent', 'AgentController@index')->name('agentdashboard');