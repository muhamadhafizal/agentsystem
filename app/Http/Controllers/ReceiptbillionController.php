<?php

namespace App\Http\Controllers;
use App\Receiptbillion;
use Redirect;
use Illuminate\Http\Request;

class ReceiptbillionController extends Controller
{
    public function index(){

        $receipts = Receiptbillion::orderby('created_at','desc')->get();
        $i = 1;

        return view('admin/billion/receipt/index', compact('receipts','i'));
    }

    public function add(){

        return view('admin/billion/receipt/add');
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

        $receipt = new Receiptbillion;
        $receipt->sst_no = $sst_no;
        $receipt->receiptnum = $receiptnum;
        $receipt->date = $date;
        $receipt->payment_method = $payment_method;
        $receipt->received_from = $received_from;
        $receipt->amount_paid = $amount_paid;
        $receipt->being_payment = $being_payment;
        $receipt->address = $address;
        $receipt->save();

        \Session::flash('flash_message', 'successfully save receipt');
        return Redirect::route('listreceiptbillion');

    }

    public function destroy($id){
        
        $receipt = Receiptbillion::find($id);
        $receipt->delete($receipt->id);
        \Session::flash('flash_message_delete','success deleted receipt');

        return Redirect::route('listreceiptbillion');

    }

    public function edit($id){
        
        $receipt = Receiptbillion::find($id);

        return view('admin/billion/receipt/edit', compact('receipt'));

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

        $receipt = Receiptbillion::find($receipt_id);
        $receipt->sst_no = $sst_no;
        $receipt->receiptnum = $receiptnum;
        $receipt->date = $date;
        $receipt->payment_method = $payment_method;
        $receipt->received_from = $received_from;
        $receipt->amount_paid = $amount_paid;
        $receipt->being_payment = $being_payment;
        $receipt->address = $address;
        $receipt->save();

        $id = $receipt_id;

        \Session::flash('flash_message', 'successfully update receipt');
        return Redirect::route('editreceiptbillion', compact('id'));

    }

    public function details($id){

        $details = Receiptbillion::find($id);
        $dateform = date("d M Y", strtotime($details->date));
    
        $receiptarray = [
            'id' => $details->id,
            'receiptnum' => $details->receiptnum,
            'date' => $dateform,
            'payment_method' => $details->payment_method,
            'received_from' => $details->received_from,
            'amount_paid' => $details->amount_paid,
            'being_payment' => $details->being_payment,
            'address' => $details->address,

        ];

        return view('admin/billion/receipt/details', compact('receiptarray'));

    }
}
