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

//Project admin
Route::get('/project', 'ProjectController@index')->name('admindashboardproject');

//agent
Route::get('/agent', 'AgentController@index')->name('agentdashboard');