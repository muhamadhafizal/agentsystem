<?php

namespace App\Http\Controllers;
use App\Voucherbillion;
use Illuminate\Http\Request;
use Redirect;

class VoucherbillionController extends Controller
{
    public function index(){

        $voucher = Voucherbillion::orderby('created_at','desc')->get();
        $i = 1;

        return view('admin/billion/voucher/index', compact('voucher','i'));

    }

    public function add(){

        return view('admin/billion/voucher/add');
    }

    public function store(Request $request){

        $vouchernum = $request->input('vouchernum');
        $date = $request->input('date');
        $address = $request->input('address');
        $pay_to = $request->input('pay_to');
        $nric = $request->input('nric');
        $bank_details = $request->input('bank_details');

        $desc1 = $request->input('desc1');
        $amount1 = $request->input('amount1');
        $desc2 = $request->input('desc2');
        $amount2 = $request->input('amount2');
        $desc3 = $request->input('desc3');
        $amount3 = $request->input('amount3');
        $desc4 = $request->input('desc4');
        $amount4 = $request->input('amount4');
        $desc5 = $request->input('desc5');
        $amount5 = $request->input('amount5');
        $desc6 = $request->input('desc6');
        $amount6 = $request->input('amount6');
        $desc7 = $request->input('desc7');
        $amount7 = $request->input('amount7');
        $desc8 = $request->input('desc8');
        $amount8 = $request->input('amount8');
        $desc9 = $request->input('desc9');
        $amount9 = $request->input('amount9');
        $desc10 = $request->input('desc10');
        $amount10 = $request->input('amount10');

        
        $descriptionarray = array();

        $temparray = [
            'description' => $desc1,
            'amount' => $amount1,
        ];

        array_push($descriptionarray,$temparray);
        
        $temparray = [
            'description' => $desc2,
            'amount' => $amount2,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc3,
            'amount' => $amount3,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc4,
            'amount' => $amount4,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc5,
            'amount' => $amount5,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc6,
            'amount' => $amount6,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc7,
            'amount' => $amount7,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc8,
            'amount' => $amount8,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc9,
            'amount' => $amount9,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc10,
            'amount' => $amount10,
        ];

        array_push($descriptionarray,$temparray);
       
        $desc = json_encode($descriptionarray);

        $voucher = new Voucherbillion;
        $voucher->vouchernum = $vouchernum;
        $voucher->pay_to = $pay_to;
        $voucher->bank_details = $bank_details;
        $voucher->nric = $nric;
        $voucher->description = $desc;
        $voucher->date = $date;
        $voucher->address = $address;
        $voucher->save();

        \Session::flash('flash_message', 'successfully add new voucher');
        return Redirect::route('listvoucherbillion');

    }

    public function destroy($id){

        $voucher = Voucherbillion::find($id);
        $voucher->delete($voucher->id);
        \Session::flash('flash_message_delete','success deleted voucher');

        return Redirect::route('listvoucherbillion');

    }

    public function edit($id){

        $details = Voucherbillion::find($id);

        $descriptionarray = json_decode($details->description);

        return view('admin/billion/voucher/edit', compact('details','descriptionarray'));

    }

    public function update(Request $request){


        $voucherid = $request->input('voucher_id');
        
        $vouchernum = $request->input('vouchernum');
        $date = $request->input('date');
        $address = $request->input('address');
        $pay_to = $request->input('pay_to');
        $nric = $request->input('nric');
        $bank_details = $request->input('bank_details');

        $desc1 = $request->input('desc1');
        $amount1 = $request->input('amount1');
        $desc2 = $request->input('desc2');
        $amount2 = $request->input('amount2');
        $desc3 = $request->input('desc3');
        $amount3 = $request->input('amount3');
        $desc4 = $request->input('desc4');
        $amount4 = $request->input('amount4');
        $desc5 = $request->input('desc5');
        $amount5 = $request->input('amount5');
        $desc6 = $request->input('desc6');
        $amount6 = $request->input('amount6');
        $desc7 = $request->input('desc7');
        $amount7 = $request->input('amount7');
        $desc8 = $request->input('desc8');
        $amount8 = $request->input('amount8');
        $desc9 = $request->input('desc9');
        $amount9 = $request->input('amount9');
        $desc10 = $request->input('desc10');
        $amount10 = $request->input('amount10');

        $descriptionarray = array();

        $temparray = [
            'description' => $desc1,
            'amount' => $amount1,
        ];

        array_push($descriptionarray,$temparray);
        
        $temparray = [
            'description' => $desc2,
            'amount' => $amount2,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc3,
            'amount' => $amount3,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc4,
            'amount' => $amount4,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc5,
            'amount' => $amount5,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc6,
            'amount' => $amount6,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc7,
            'amount' => $amount7,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc8,
            'amount' => $amount8,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc9,
            'amount' => $amount9,
        ];

        array_push($descriptionarray,$temparray);

        $temparray = [
            'description' => $desc10,
            'amount' => $amount10,
        ];

        array_push($descriptionarray,$temparray);
       
        $desc = json_encode($descriptionarray);


        $voucher = Voucherbillion::find($voucherid);
        $voucher->vouchernum = $vouchernum;
        $voucher->pay_to = $pay_to;
        $voucher->bank_details = $bank_details;
        $voucher->nric = $nric;
        $voucher->description = $desc;
        $voucher->date = $date;
        $voucher->address = $address;
        $voucher->save();

        $id = $voucherid;

        \Session::flash('flash_message', 'successfully update voucher');
        return Redirect::route('editvoucherbillion', compact('id'));

    }

    public function details($id){
        
        $details = Voucherbillion::find($id);
        $dateform = date("d M Y", strtotime($details->date));

        $descriptionarray = json_decode($details->description);

        $totalamount = 0;

       
        for($x=0; $x<10; $x++){

            $totalamount = $totalamount + $descriptionarray[$x]->amount;

        }
       
        return view('admin/billion/voucher/details', compact('details','descriptionarray','dateform','totalamount'));

    }
}
