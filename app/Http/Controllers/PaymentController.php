<?php

namespace App\Http\Controllers;
use App\User;
use App\Payment;
use Redirect;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function getinfo() {

		$username = session()->get('username');
		$password = session()->get('password');
		$role = session()->get('role');

		$user = User::all()->where('username', $username)
			->where('password', $password)
			->first();
		return $user;
    }

    public function index(){

        $user = $this->getinfo();

        $payments = Payment::where('agent_id',$user->id)->where('status',0)->get();

        $i = 1;
        
        return view('agent/payment/index', compact('payments','i'));
    }

    public function add(){

        return view('agent/payment/add');
    }

    public function store(Request $request){

        $user = $this->getinfo();

        $name = $request->input('name');
        $nric = $request->input('nric');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $amount = $request->input('amount');
        $address = $request->input('address');

        //cp number
        $payments = Payment::all();
        $total = count($payments);

        $temp_cp_num = $total + 1;

        $cp_num = str_pad($temp_cp_num, 4, '0', STR_PAD_LEFT);

        if($user){

            $payment = new Payment;
            $payment->agent_id = $user->id;
            $payment->cp_num = $cp_num;
            $payment->name = $name;
            $payment->ic = $nric;
            $payment->email = $email;
            $payment->contact = $contact;
            $payment->amount = $amount;
            $payment->address = $address;

            $payment->save();

            \Session::flash('flash_message', 'successfully save confirmation on payment');
            
        }

        return Redirect::route('agentlistpayment');
        

    }

    public function destroy($id){
        

        $payment = Payment::find($id);
        $payment->status = 1;
        $payment->save();

        \Session::flash('flash_message_delete','success deleted payment');
        return Redirect::route('agentlistpayment');

    }

    public function edit($id){
        
        $payment = Payment::find($id);

        return view('agent/payment/edit', compact('payment'));

    }

    public function update(Request $request){

        $payment_id = $request->input('payment_id');
        $name = $request->input('name');
        $ic = $request->input('nric');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $amount = $request->input('amount');
        $address = $request->input('address');

        $payment = Payment::find($payment_id);
        $payment->name = $name;
        $payment->ic = $ic;
        $payment->email = $email;
        $payment->contact = $contact;
        $payment->amount = $amount;
        $payment->address = $address;
        $payment->save();

        $id = $payment_id;

        \Session::flash('flash_message', 'successfully update payment');
        return Redirect::route('editpayment', compact('id'));

    }

    public function details($id){

        $payment = Payment::find($id);
        $agentdetails = User::find($payment->agent_id);

        return view('agent/payment/details', compact('payment','agentdetails'));

    }
}
