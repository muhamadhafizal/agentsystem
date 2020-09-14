<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Redirect;

class InvoiceController extends Controller
{
    public function index(){

        $invoice = Invoice::all();
        $i = 1;

        return view('admin/invoice/index', compact('invoice','i'));

    }

    public function store(){
        
        $getlast = Invoice::latest('created_at','desc')->first();

        if($getlast){

            $num = $getlast->num+1;

        } else {

            $num = 1;
           
        }

        $numpad =  str_pad($num, 4, "0", STR_PAD_LEFT); 

        $currentyear = date('Y');
        $invoicenum = 'MW/'. $currentyear .'/'.$numpad;
  
        $invoice = new Invoice;
        $invoice->num = $num;
        $invoice->invoicenum = $invoicenum;
        $invoice->save();

        \Session::flash('flash_message', 'successfully generate new invoice number');
        return Redirect::route('listinvoice');

    }

    public function destroy($id){

        $invoice = Invoice::find($id);
        $invoice->delete($invoice->id);
        \Session::flash('flash_message_delete','success deleted invoice');

        return Redirect::route('listinvoice');


    }

    public function details($id){

        $details = Invoice::find($id);

        return view('admin/invoice/details', compact('details'));

    }
}
