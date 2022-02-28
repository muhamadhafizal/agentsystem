<?php

namespace App\Http\Controllers;
use Redirect;
use App\Payment;
use App\Letter;
use App\User;
use Illuminate\Http\Request;

class AdminletterController extends Controller
{

    public function indexpayment(){

        $paymentarray = array();

        $payments = Payment::where('status',0)->get();

        foreach($payments as $payment){
            $agentinfo = User::find($payment->agent_id);

            $temparray = [
                'id' => $payment->id,
                'agent' => $agentinfo->nickname,
                'cp_num' => $payment->cp_num,
                'name' => $payment->name,
                'contact' => $payment->contact,
                'amount' => $payment->amount,
            ];

            array_push($paymentarray,$temparray);
        }

        $i = 1;
        //dd($paymentarray);
        
        return view('admin/payment/index', compact('payments','i','paymentarray'));

    }

    public function detailpayment($id){

        $payment = Payment::find($id);
        $agentdetails = User::find($payment->agent_id);

        return view('admin/payment/detail', compact('payment','agentdetails'));

    }
    
    public function editpayment($id){
        //dd($id);
        $payment = Payment::find($id);
    
        return view('admin/payment/edit', compact('payment'));

    }

    public function updatepayment(Request $request){

        $payment_id = $request->input('payment_id');
        $name = $request->input('name');
        $ic = $request->input('nric');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $amount = $request->input('amount');

        $payment = Payment::find($payment_id);
        $payment->name = $name;
        $payment->ic = $ic;
        $payment->email = $email;
        $payment->contact = $contact;
        $payment->amount = $amount;
        $payment->save();

        $id = $payment_id;

        \Session::flash('flash_message', 'successfully update payment');
        return Redirect::route('admineditpayment', compact('id'));

    }

    public function indexletter(){

        $letterarray = array();
        $letters = Letter::where('status',0)->get();

        foreach($letters as $letter){

            $userinfo = User::find($letter->agent_id);

            $temparray = [
                'id' => $letter->id,
                'agent' => $userinfo->nickname,
                'name' => $letter->name,
                'contact' => $letter->contact,
                'date' => $letter->created_at,
            ];

            array_push($letterarray,$temparray);

        }


        $i = 1;

        return view('admin/letter/index', compact('letters','i','letterarray'));

    }

    public function detailletter($id){

        $letter = Letter::find($id);
        $userinfo = User::find($letter->id);

        return view('/admin/letter/detail', compact('userinfo','letter'));

    }

    public function editletter($id){

        $letter = Letter::find($id);

        return view('admin/letter/edit', compact('letter'));

    }

    public function updateletter(Request $request){

        $letter_id = $request->input('letter_id');
        $name = $request->input('name');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $date = $request->input('date');
        $authorized = $request->input('authorized');
        $sellingprice = $request->input('sellingprice');
        $agencyfee = $request->input('agencyfee');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');


        $letter = Letter::find($letter_id);
        $letter->name = $name;
        $letter->ic = $ic;
        $letter->contact = $contact;
        $letter->date = $date;
        $letter->authorized = $authorized;
        $letter->sellingprice = $sellingprice;
        $letter->agencyfee = $agencyfee;
        $letter->startdate = $startdate;
        $letter->enddate = $enddate;

        $letter->save();

        $id = $letter_id;

        \Session::flash('flash_message', 'successfully update letter');
        return Redirect::route('admineditletter', compact('id'));

    }
}
