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
Route::get('/admin/chart/rental', 'AdminController@chartrental');

//rentalsubsale
Route::get('/rental', 'RentalController@index')->name('allrentals');
Route::get('/rental/add', 'RentalController@addrental')->name('addrental');
Route::post('/rental/post', 'RentalController@store')->name('storerental');
Route::get('/rental/details/{id}', 'RentalController@show')->name('detailsrental');
Route::get('/rental/edit/{id}/{type}', 'RentalController@edit')->name('editrental');
Route::post('/rental/update/{id}', 'RentalController@update')->name('updaterental');
Route::get('/rental/delete/{id}/{type}', 'RentalController@destroy');
Route::get('/rental/listmonth', 'RentalController@listmonth')->name('listmonth');
Route::get('/rental/month/{month}/{year}', 'RentalController@getmonth')->name('getmonth');
Route::get('/rental/detailsmonth/{id}', 'RentalController@detailsmonth')->name('detailsrentalmonth');

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

//area
Route::get('/area', 'AreaController@index')->name('listarea');
Route::post('/area/add','AreaController@store')->name('addarea');
Route::get('/area/delete/{id}', 'AreaController@destroy');
Route::get('/area/details/{id}', 'AreaController@details');
Route::post('/area/update/', 'AreaController@update')->name('updatearea');

//rental agent
Route::get('/agent', 'AgentController@index')->name('agentdashboard');
Route::get('/agent/rental', 'AgentController@listrental')->name('agentlistrental');
Route::get('agent/details/{id}/{type}', 'AgentController@details')->name('agentdetailsrental');
Route::get('/agent/listmonth', 'AgentController@listmonth')->name('agentlistmonth');
Route::get('/agent/month/{month}/{year}', 'AgentController@getmonth')->name('agentgetmonth');
Route::get('/agent/chart/rental', 'AgentController@chartrental');
Route::get('/agent/profile', 'AgentController@profile')->name('profile');
Route::get('/agent/edit/{id}', 'AgentController@editagent')->name('editagent');
Route::post('/agent/update/{id}', 'AgentController@updateagent')->name('updateprofile');

//project agent
Route:: get('/agent/project', 'ProjectagentController@index')->name('projectagentdashboard');

//excell
Route::get('/admin/agentexcell', 'ExcelController@agent')->name('agentexcell');
Route::get('/admin/rentalmonthexcell/{month}/{year}', 'ExcelController@excelrentalmonth')->name('rentalmonthexcell');

//Receipt
Route::get('/admin/receipt', 'ReceiptController@index')->name('listreceipt');
Route::get('/admin/addreceipt', 'ReceiptController@store')->name('addreceipt');
Route::get('/admin/receipt/delete/{id}', 'ReceiptController@destroy');

//Invoice
Route::get('/admin/invoice', 'InvoiceController@index')->name('listinvoice');
Route::get('/admin/invoice/addinvoice', 'InvoiceController@store')->name('addinvoice');
Route::get('/admin/invoice/delete/{id}', 'InvoiceController@destroy');

//PaymentVoucher
Route::get('/admin/voucher', 'VoucherController@index')->name('listvoucher');
Route::get('/admin/voucher/addvoucher', 'VoucherController@store')->name('addvoucher');
Route::get('/admin/voucher/delete/{id}', 'VoucherController@destroy');

