<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use Redirect;

class VoucherController extends Controller
{
    public function index(){

        $voucher = Voucher::all();
        $i = 1;

        return view('admin/voucher/index', compact('voucher','i'));
    }

    public function store(){
        
        $getlast = Voucher::latest('created_at','desc')->first();

        if($getlast){

            $num = $getlast->num+1;

        } else {

            $num = 1;
           
        }

        $numpad =  str_pad($num, 4, "0", STR_PAD_LEFT); 

        $currentyear = date('Y');
        $vouchernum = 'MW/'. $currentyear .'/'.$numpad;
  
        $voucher = new Voucher;
        $voucher->num = $num;
        $voucher->vouchernum = $vouchernum;
        $voucher->save();

        \Session::flash('flash_message', 'successfully generate new voucher number');
        return Redirect::route('listvoucher');

    }

    public function destroy($id){

        $voucher = Voucher::find($id);
        $voucher->delete($voucher->id);
        \Session::flash('flash_message_delete','success deleted voucher');

        return Redirect::route('listvoucher');


    }
}
