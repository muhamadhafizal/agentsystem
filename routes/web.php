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
Route::get('/rental/paymentvoucher/{id}/{type}', 'RentalController@paymentvoucher')->name('paymentvoucherrentals');
Route::get('/rental/detailspaymentvoucher/{id}/{caseid}/{listid}', 'RentalController@detailspaymentvoucher')->name('paymentvoucherrentaldetails');
Route::post('/rental/getyear','RentalController@getyearadminrental')->name('getyearadminrental');

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
Route::post('/project/getyear','ProjectController@getyearadminproject')->name('getyearadminproject');


//area
Route::get('/area', 'AreaController@index')->name('listarea');
Route::post('/area/add','AreaController@store')->name('addarea');
Route::get('/area/delete/{id}', 'AreaController@destroy');
Route::get('/area/details/{id}', 'AreaController@details');
Route::post('/area/update/', 'AreaController@update')->name('updatearea');

//rental agent
Route::get('/agentrental', 'AgentController@index')->name('agentdashboard');
Route::get('/agentrental/indexyear/{year}','AgentController@indexyear');
Route::get('/agent/rental', 'AgentController@listrental')->name('agentlistrental');
Route::get('agent/details/{id}/{type}', 'AgentController@details')->name('agentdetailsrental');
Route::get('/agent/listmonth', 'AgentController@listmonth')->name('agentlistmonth');
Route::get('/agent/month/{month}/{year}', 'AgentController@getmonth')->name('agentgetmonth');
Route::get('/agent/chart/rental', 'AgentController@chartrental');
Route::get('/agent/chart/rental/chartyear/{year}', 'AgentController@chartrentalyear');
Route::get('/agent/profile', 'AgentController@profile')->name('profile');
Route::get('/agent/edit/{id}', 'AgentController@editagent')->name('editagent');
Route::post('/agent/update/{id}', 'AgentController@updateagent')->name('updateprofile');
Route::post('/agent/getyear','AgentController@getyearagentrental')->name('getyearagentrental');

//project agent
Route:: get('/agent/project', 'ProjectagentController@index')->name('projectagentdashboard');

//excell
Route::get('/admin/agentexcell', 'ExcelController@agent')->name('agentexcell');
Route::get('/admin/rentalmonthexcell/{month}/{year}', 'ExcelController@excelrentalmonth')->name('rentalmonthexcell');
Route::get('/admin/projectmonthexcell/{month}/{year}/{status}', 'ExcelController@excelprojectmonth')->name('projectmonthexcell');

//Receipt
Route::get('/admin/receipt', 'ReceiptController@index')->name('listreceipt');
Route::get('/admin/receipt/add', 'ReceiptController@add')->name('addreceipt');
Route::get('/admin/receipt/delete/{id}', 'ReceiptController@destroy');
Route::get('/admin/receipt/details/{id}', 'ReceiptController@details')->name('detailsreceipt');
Route::post('/admin/receipt/store', 'ReceiptController@store')->name('storereceipt');
Route::get('/admin/receipt/edit/{id}','ReceiptController@edit')->name('editreceipt');
Route::post('/admin/receipt/update', 'ReceiptController@update')->name('updatereceipt');

//Receiptbillion
Route::get('/admin/billion/receipt', 'ReceiptbillionController@index')->name('listreceiptbillion');
Route::get('/admin/billion/receipt/add', 'ReceiptbillionController@add')->name('billionaddreceipt');
Route::post('/admin/billion/receipt/store', 'ReceiptbillionController@store')->name('storereceiptbillion');
Route::get('/admin/billion/receipt/delete/{id}', 'ReceiptbillionController@destroy')->name('billiondestroyreceipt');
Route::get('/admin/billion/receipt/edit/{id}', 'ReceiptbillionController@edit')->name('editreceiptbillion');
Route::post('/admin/billion/receipt/update', 'ReceiptbillionController@update')->name('updatereceiptbillion');
Route::get('/admin/billion/receipt/details/{id}','ReceiptbillionController@details')->name('detailsreceiptbillion');

//Invoice
Route::get('/admin/invoice', 'InvoiceController@index')->name('listinvoice');
Route::get('/admin/invoice/addinvoice', 'InvoiceController@add')->name('addinvoice');
Route::get('/admin/invoice/delete/{id}', 'InvoiceController@destroy');
Route::get('/admin/invoice/details/{id}', 'InvoiceController@details')->name('detailsinvoice');
Route::post('/admin/invoice/store', 'InvoiceController@store')->name('storeinvoice');
Route::get('/admin/invoice/edit/{id}','InvoiceController@edit')->name('editinvoice');
Route::post('/admin/invoice/update', 'InvoiceController@update')->name('updateinvoice');

//Invoicebillion
Route::get('/admin/billion/invoice', 'InvoicebillionController@index')->name('listinvoicebillion');
Route::get('/admin/billion/invoice/add', 'InvoicebillionController@add')->name('addinvoicebillion');
Route::post('/admin/billion/invoice/post', 'InvoicebillionController@store')->name('storeinvoicebillion');
Route::get('/admin/billion/invoice/delete/{id}', 'InvoicebillionController@destroy');
Route::get('/admin/billion/invoice/edit/{id}', 'InvoicebillionController@edit')->name('editinvoicebillion');
Route::post('/admin/billion/invoice/update', 'InvoicebillionController@update')->name('updateinvoicebillion');
Route::get('/admin/billion/invoice/details/{id}', 'InvoicebillionController@details')->name('detailsinvoicebillion');

//PaymentVoucher
Route::get('/admin/voucher', 'VoucherController@index')->name('listvoucher');
Route::get('/admin/voucher/addvoucher', 'VoucherController@add')->name('addvoucher');
Route::get('/admin/voucher/delete/{id}', 'VoucherController@destroy');
Route::get('/admin/voucher/details/{id}', 'VoucherController@details')->name('detailsvoucher');
Route::post('/admin/voucher/store', 'VoucherController@store')->name('storevoucher');
Route::get('/admin/voucher/edit/{id}','VoucherController@edit')->name('editvoucher');
Route::post('admin/voucher/update', 'VoucherController@update')->name('updatevoucher');

//PaymentVoucherBillion
Route::get('/admin/billion/voucher', 'VoucherbillionController@index')->name('listvoucherbillion');
Route::get('/admin/billion/voucher/add', 'VoucherbillionController@add')->name('addvoucherbillion');
Route::post('/admin/billion/voucher/post', 'VoucherbillionController@store')->name('storevoucherbillion');
Route::get('/admin/billion/voucher/delete/{id}', 'VoucherbillionController@destroy');
Route::get('/admin/billion/voucher/edit/{id}', 'VoucherbillionController@edit')->name('editvoucherbillion');
Route::post('/admin/billion/voucher/update', 'VoucherbillionController@update')->name('updatevoucherbillion');
Route::get('/admin/billion/voucher/details/{id}','VoucherbillionController@details')->name('detailsvoucherbillion');

//Agentproject
Route::get('/agentproject', 'AgentprojectController@index')->name('agentprojectdashboard');
Route::get('/agent/project/list', 'AgentprojectController@list')->name('agentlistproject');
Route::get('/agent/project/details/{id}/{type}', 'AgentprojectController@details')->name('agentdetailsproject');
Route::get('/agent/project/listmonth', 'AgentprojectController@listmonth')->name('agentlistmonthproject');
Route::get('/agent/project/month/{month}/{year}', 'AgentprojectController@getmonth')->name('agentprojectgetmonth');
Route::get('/agent/chart/project', 'AgentprojectController@chartproject');
Route::post('/agent/project/getyear','AgentprojectController@getyearagentproject')->name('getyearagentproject');


//Agentpayment
Route::get('/agent/payment/list', 'PaymentController@index')->name('agentlistpayment');
Route::get('/agent/payment/add', 'PaymentController@add')->name('addpayment');
Route::post('/agent/payment/store', 'PaymentController@store')->name('storepayment');
Route::get('/agent/payment/delete/{id}', 'PaymentController@destroy');
Route::get('/agent/payment/edit/{id}', 'PaymentController@edit')->name('editpayment');
Route::post('/agent/payment/update', 'PaymentController@update')->name('updatepayment');
Route::get('/agent/payment/details/{id}', 'PaymentController@details')->name('detailspayment');

//Agentletter
Route::get('/agent/letter/list', 'LetterController@index')->name('agentlistletter');
Route::get('/agent/letter/add', 'LetterController@add')->name('addletter');
Route::post('/agent/letter/store', 'LetterController@store')->name('storeletter');
Route::get('/agent/letter/delete/{id}', 'LetterController@destroy');
Route::get('/agent/letter/edit/{id}', 'LetterController@edit')->name('editletter');
Route::post('/agent/letter/update', 'LetterController@update')->name('updateletter');
Route::get('/agent/letter/details/{id}', 'LetterController@detail')->name('detailsletter');

//Adminpayment
Route::get('/admin/payment/list', 'AdminletterController@indexpayment')->name('adminlistpayment');
Route::get('/admin/payment/details/{id}', 'AdminletterController@detailpayment')->name('admindetailspayment');
Route::get('/admin/payment/edit/{id}', 'AdminletterController@editpayment')->name('admineditpayment');
Route::post('/admin/payment/update', 'AdminletterController@updatepayment')->name('adminupdatepayment');

//Adminletter
Route::get('/admin/letter/list', 'AdminletterController@indexletter')->name('adminlistletter');
Route::get('/admin/letter/details/{id}', 'AdminletterController@detailletter')->name('admindetailsletter');
Route::get('/admin/letter/edit/{id}', 'AdminletterController@editletter')->name('admineditletter');
Route::post('/admin/letter/update', 'AdminletterController@updateletter')->name('adminupdateletter');

//AgentOTP
Route::get('/agent/otp/list', 'PurchaseController@index')->name('agentlistotp');
Route::get('/agent/otp/add', 'PurchaseController@add')->name('addotp');
Route::post('/agent/otp/store', 'PurchaseController@store')->name('storeotp');
Route::get('/agent/otp/details/{id}', 'PurchaseController@details')->name('detailsotp');
Route::get('/agent/otp/edit/{id}', 'PurchaseController@edit')->name('editotp');
Route::post('/agent/otp/update', 'PurchaseController@update')->name('updateotp');

//AgentOTL
Route::get('/agent/otl/list', 'OfferController@index')->name('agentlistotl');
Route::get('/agent/otl/add', 'OfferController@add')->name('addotl');
Route::post('/agent/otl/store', 'OfferController@store')->name('storeotl');
Route::get('/agent/otl/details/{id}', 'OfferController@details')->name('detailsotl');
Route::get('/agent/otl/edit/{id}', 'OfferController@edit')->name('editotl');
Route::post('/agent/otl/update', 'OfferController@update')->name('updateotl');

//AdminOTP
Route::get('/admin/otp/list', 'AdminletterController@indexotp')->name('adminlistotp');
Route::get('/admin/otp/details/{id}', 'AdminletterController@detailsotp')->name('admindetailsotp');
Route::get('/admin/otp/edit/{id}', 'AdminletterController@editotp')->name('admineditotp');
Route::post('/admin/otp/update', 'AdminletterController@updateotp')->name('adminupdateotp');

//AdminOTL
Route::get('/admin/otl/list', 'AdminletterController@indexotl')->name('adminlistotl');
Route::get('/admin/otl/details/{id}','AdminletterController@detailsotl')->name('admindetailsotl');
Route::get('/admin/otl/edit/{id}', 'AdminletterController@editotl')->name('admineditotl');
Route::post('/admin/otl/update', 'AdminletterController@updateotl')->name('adminupdateotl');