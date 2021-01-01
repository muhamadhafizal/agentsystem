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
Route::get('/admin/chart/rental/chartyear/{year}', 'AdminController@chartrentalyear');
Route::get('/admin/rental/indexyear/{year}', 'AdminController@indexyear');

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
Route::get('/rental/paymentvoucher', 'RentalController@paymentvoucher')->name('paymentvoucherrentals');

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
Route::geT('/project/chart', 'ProjectController@chartproject');
Route::get('/project/add', 'ProjectController@addproject')->name('addproject');
Route::post('/project/post', 'ProjectController@store')->name('storeproject');
Route::get('/project/list', 'ProjectController@list')->name('listproject');
Route::get('/project/delete/{id}/{type}', 'ProjectController@destroy');
Route::get('/project/details/{id}/{type}', 'ProjectController@details')->name('detailsproject');
Route::get('/project/edit/{id}/{type}', 'ProjectController@edit')->name('editproject');
Route::post('/project/update', 'ProjectController@update')->name('updateproject');
Route::get('/project/listmonth', 'ProjectController@listmonth')->name('listmonthproject');
Route::get('/project/month/{month}/{year}/{status}', 'ProjectController@getmonth')->name('getmonth');
Route::post('/project/month/status', 'ProjectController@statusmonth')->name('statusmonth');
Route::get('/project/dashboard/{year}/{status}', 'ProjectController@dashboardstatus');
Route::get('/project/dashboard/card/{year}/{status}', 'ProjectController@dashboardcardstatus');
Route::get('/project/paymentvoucher', 'ProjectController@paymentvoucher')->name('paymentvoucherproject');
Route::post('/project/paymentvoucher', 'ProjectController@storepaymentvoucher')->name('storevoucherproject');
Route::get('/project/paymentvoucher/delete/{id}', 'ProjectController@destroyvoucher');
Route::get('/project/paymentvoucher/detailsprojectvoucher/{id}', 'ProjectController@detailsprojectvoucher')->name('detailsprojectvoucher');


//area
Route::get('/area', 'AreaController@index')->name('listarea');
Route::post('/area/add','AreaController@store')->name('addarea');
Route::get('/area/delete/{id}', 'AreaController@destroy');
Route::get('/area/details/{id}', 'AreaController@details');
Route::post('/area/update/', 'AreaController@update')->name('updatearea');

//rental agent
Route::get('/agentrental', 'AgentController@index')->name('agentdashboard');
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
Route::get('/admin/projectmonthexcell/{month}/{year}/{status}', 'ExcelController@excelprojectmonth')->name('projectmonthexcell');

//Receipt
Route::get('/admin/receipt', 'ReceiptController@index')->name('listreceipt');
Route::get('/admin/addreceipt', 'ReceiptController@store')->name('addreceipt');
Route::get('/admin/receipt/delete/{id}', 'ReceiptController@destroy');
Route::get('/admin/receipt/details/{id}', 'ReceiptController@details')->name('detailsreceipt');

//Invoice
Route::get('/admin/invoice', 'InvoiceController@index')->name('listinvoice');
Route::get('/admin/invoice/addinvoice', 'InvoiceController@store')->name('addinvoice');
Route::get('/admin/invoice/delete/{id}', 'InvoiceController@destroy');
Route::get('/admin/invoice/details/{id}', 'InvoiceController@details')->name('detailsinvoice');

//PaymentVoucher
Route::get('/admin/voucher', 'VoucherController@index')->name('listvoucher');
Route::get('/admin/voucher/addvoucher', 'VoucherController@store')->name('addvoucher');
Route::get('/admin/voucher/delete/{id}', 'VoucherController@destroy');
Route::get('/admin/vouvher/details/{id}', 'VoucherController@details')->name('detailsvoucher');

//Agentproject
Route::get('/agentproject', 'AgentprojectController@index')->name('agentprojectdashboard');
Route::get('/agent/project/list', 'AgentprojectController@list')->name('agentlistproject');
Route::get('/agent/project/details/{id}/{type}', 'AgentprojectController@details')->name('agentdetailsproject');
Route::get('/agent/project/listmonth', 'AgentprojectController@listmonth')->name('agentlistmonthproject');
Route::get('/agent/project/month/{month}/{year}', 'AgentprojectController@getmonth')->name('agentprojectgetmonth');
Route::get('/agent/chart/project', 'AgentprojectController@chartproject');
