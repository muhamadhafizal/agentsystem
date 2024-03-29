<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receipt;
use Redirect;
class ReceiptController extends Controller
{
    public function index(){

       
        $receipts = Receipt::orderby('created_at','desc')->get();
        $i = 1;

        return view('admin/receipt/receiptindex', compact('receipts','i'));
    }

    public function add(){

        return view('admin/receipt/receiptadd');
    }

    public function store(Request $request){
        
        $sst_no = $request->input('sst_no');
        $receiptnum = $request->input('receiptnum');
        $date = $request->input('date');
        $payment_method = $request->input('payment_method');
        $received_from = $request->input('received_from');
        $amount_paid = $request->input('amount_paid');
        $being_payment = $request->input('being_payment');
        $address = $request->input('address');

        $receipt = new Receipt;
        $receipt->sst_no = $sst_no;
        $receipt->receiptnum = $receiptnum;
        $receipt->date = $date;
        $receipt->payment_method = $payment_method;
        $receipt->received_from = $received_from;
        $receipt->amount_paid = $amount_paid;
        $receipt->being_payment = $being_payment;
        $receipt->address = $address;
        $receipt->num = '001';
        $receipt->save();

        \Session::flash('flash_message', 'successfully save receipt');
        return Redirect::route('listreceipt');


        // $getlast = Receipt::latest('created_at','desc')->first();

        // if($getlast){

        //     $num = $getlast->num+1;

        // } else {

        //     $num = 1;
           
        // }

        // $numpad =  str_pad($num, 4, "0", STR_PAD_LEFT); 

        // $currentyear = date('Y');
        // $receiptnum = 'MW/'. $currentyear .'/'.$numpad;
  
        // $receipt = new Receipt;
        // $receipt->num = $num;
        // $receipt->receiptnum = $receiptnum;
        // $receipt->save();

        

    }

    public function destroy($id){

        $receipt = Receipt::find($id);
        $receipt->delete($receipt->id);
        \Session::flash('flash_message_delete','success deleted receipt');

        return Redirect::route('listreceipt');


    }

  

    public function details($id){

        $details = Receipt::find($id);
        $dateform = date("d M Y", strtotime($details->date));
    

        $receiptarray = [
            'id' => $details->id,
            'sst_no' => $details->sst_no,
            'receiptnum' => $details->receiptnum,
            'date' => $dateform,
            'payment_method' => $details->payment_method,
            'received_from' => $details->received_from,
            'amount_paid' => $details->amount_paid,
            'being_payment' => $details->being_payment,
            'address' => $details->address,

        ];
       
        return view('admin/receipt/details', compact('receiptarray'));

    }

    public function edit($id){
        
        $receipt = Receipt::find($id);

        return view('admin/receipt/edit', compact('receipt'));

    }

    public function update(Request $request){

        $receipt_id = $request->input('receipt_id');
        $sst_no = $request->input('sst_no');
        $receiptnum = $request->input('receiptnum');
        $date = $request->input('date');
        $payment_method = $request->input('payment_method');
        $received_from = $request->input('received_from');
        $amount_paid = $request->input('amount_paid');
        $being_payment = $request->input('being_payment');
        $address = $request->input('address');

        $receipt = Receipt::find($receipt_id);
        $receipt->sst_no = $sst_no;
        $receipt->receiptnum = $receiptnum;
        $receipt->date = $date;
        $receipt->payment_method = $payment_method;
        $receipt->received_from = $received_from;
        $receipt->amount_paid = $amount_paid;
        $receipt->being_payment = $being_payment;
        $receipt->address = $address;
        $receipt->num = '001';
        $receipt->save();

        $id = $receipt_id;

        \Session::flash('flash_message', 'successfully update receipt');
        return Redirect::route('editreceipt', compact('id'));

        

    }
}
