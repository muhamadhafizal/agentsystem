<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use Redirect;
class ReceiptController extends Controller
{
    public function index(){

        $receipt = Receipt::all();
        $i = 1;

        return view('admin/receipt/receiptindex', compact('receipt','i'));
    }

    public function store(){
        
        $getlast = Receipt::latest('created_at','desc')->first();

        if($getlast){

            $num = $getlast->num+1;

        } else {

            $num = 1;
           
        }

        $numpad =  str_pad($num, 4, "0", STR_PAD_LEFT); 

        $currentyear = date('Y');
        $receiptnum = 'MW/'. $currentyear .'/'.$numpad;
  
        $receipt = new Receipt;
        $receipt->num = $num;
        $receipt->receiptnum = $receiptnum;
        $receipt->save();

        \Session::flash('flash_message', 'successfully generate new receipt number');
        return Redirect::route('listreceipt');

    }

    public function destroy($id){

        $receipt = Receipt::find($id);
        $receipt->delete($receipt->id);
        \Session::flash('flash_message_delete','success deleted receipt');

        return Redirect::route('listreceipt');


    }

    public function details($id){

        $details = Receipt::find($id);

        return view('admin/receipt/details', compact('details'));

    }
}
