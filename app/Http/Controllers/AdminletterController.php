<?php

namespace App\Http\Controllers;
use Redirect;
use App\Payment;
use App\Letter;
use App\User;
use App\Offer;
use App\Purchase;
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

    public function indexotp(){

        $purchases = Purchase::where('status',0)->orderby('created_at','desc')->get();
        $i = 1;

        return view('admin/otp/index', compact('purchases','i'));

    }

    public function detailsotp($id){

        $details = Purchase::find($id);

        if($details->agentvendor_id){
            $vendordetails = User::find($details->agentvendor_id);
            $vendorname = $vendordetails->nickname;
            $vendoric = $vendordetails->ic;
        } else {
            $vendorname = $details->others_vendor_name;
            $vendoric = $details->others_vendor_ic;
        }

        if($details->agenttenant_id){
            $tenantdetails = User::find($details->agenttenant_id);
            $tenantname = $tenantdetails->nickname;
            $tenantic = $tenantdetails->ic;
        }  else {
            $tenantname = $details->others_tenant_name;
            $tenantic = $details->others_tenant_ic;
        }

        return view('admin/otp/details', compact('details','id','vendorname','vendoric','tenantname','tenantic'));

    }

    public function editotp($id){

        $vendor_name = '';
        $tenant_name = '';

        $details = Purchase::find($id);

        if($details->agentvendor_id){
            $details_vendor = User::find($details->agentvendor_id);
            $vendor_name = $details_vendor->nickname;
        }

        if($details->agenttenant_id){
            $details_tenant = User::find($details->agenttenant_id);
            $tenant_name = $details_tenant->nickname;
        }

        $alluser = User::where('role','agent')->get();
        return view('admin/otp/edit', compact('alluser','details','vendor_name','tenant_name'));

    }

    public function updateotp(Request $request){

        $otp_id = $request->input('otp_id');
        $date_offer = $request->input('date_offer');
        $sales_property = $request->input('sales_property');
        $deposit = $request->input('deposit');
        $purchase_price = $request->input('purchase_price');
        $condition_one = $request->input('condition_one');
        $condition_two = $request->input('condition_two');
        $vendor_name = $request->input('vendor_name');
        $vendor_ic = $request->input('vendor_ic');
        $purchaser_name = $request->input('purchaser_name');
        $purchaser_ic = $request->input('purchaser_ic');
        $agent_vendor = $request->input('agent_vendor');
        $others_vendor_name = $request->input('others_vendor_name');
        $others_vendor_ic = $request->input('others_vendor_ic');
        $agent_tenant = $request->input('agent_tenant');
        $others_tenant_name = $request->input('others_tenant_name');
        $others_tenant_ic = $request->input('others_tenant_ic');

        $purchase = Purchase::find($otp_id);
        $purchase->date_offer = $date_offer;
        $purchase->sales_property = $sales_property;
        $purchase->deposit = $deposit;
        $purchase->purchase_price = $purchase_price;
        $purchase->condition_one = $condition_one;
        $purchase->condition_two = $condition_two;
        $purchase->vendor_name = $vendor_name;
        $purchase->vendor_ic = $vendor_ic;
        $purchase->purchaser_name = $purchaser_name;
        $purchase->purchaser_ic = $purchaser_ic;
        $purchase->agentvendor_id = $agent_vendor;
        $purchase->others_vendor_name = $others_vendor_name;
        $purchase->others_vendor_ic = $others_vendor_ic;
        $purchase->agenttenant_id = $agent_tenant;
        $purchase->others_tenant_name = $others_tenant_name;
        $purchase->others_tenant_ic = $others_tenant_ic;
        $purchase->save();

        $id = $otp_id;

        \Session::flash('flash_message', 'successfully update otp');
        return Redirect::route('admineditotp', compact('id'));

    }

    public function indexotl(){

        $offers = Offer::where('status',0)->orderby('created_at','desc')->get();
        $i = 1;

        return view('admin/otl/index', compact('offers','i'));

    }

    public function detailsotl($id){

        $details = Offer::find($id);

        if($details->agentvendor_id){
            $vendordetails = User::find($details->agentvendor_id);
            $vendorname = $vendordetails->nickname;
            $vendoric = $vendordetails->ic;
        } else {
            $vendorname = $details->others_vendor_name;
            $vendoric = $details->others_vendor_ic;
        }

        if($details->agenttenant_id){
            $tenantdetails = User::find($details->agenttenant_id);
            $tenantname = $tenantdetails->nickname;
            $tenantic = $tenantdetails->ic;
        }  else {
            $tenantname = $details->others_tenant_name;
            $tenantic = $details->others_tenant_ic;
        }
      

        return view('admin/otl/details', compact('details','vendorname','vendoric','tenantname','tenantic'));

    }

    public function editotl($id){

        $vendor_name = '';
        $tenant_name = '';

        $details = Offer::find($id);

        if($details->agentvendor_id){
            $details_vendor = User::find($details->agentvendor_id);
            $vendor_name = $details_vendor->nickname;
        }

        if($details->agenttenant_id){
            $details_tenant = User::find($details->agenttenant_id);
            $tenant_name = $details_tenant->nickname;
        }

        $alluser = User::where('role','agent')->get();
        return view('admin/otl/edit', compact('alluser','details','vendor_name','tenant_name'));

    }

    public function updateotl(Request $request){

        $otl_id = $request->input('otl_id');
        $date_of_agreement = $request->input('date_of_agreement');
        $property_address = $request->input('property_address');
        $date_of_commencement = $request->input('date_of_commencement');
        $tenancy_period = $request->input('tenancy_period');
        $renewal_term = $request->input('renewal_term');
        $monthly_rental = $request->input('monthly_rental');
        $advance_rental = $request->input('advance_rental');
        $security_deposit = $request->input('security_deposit');
        $utility_deposit = $request->input('utility_deposit');
        $agreement_fee = $request->input('agreement_fee');
        $stamp_duty = $request->input('stamp_duty');
        $type = $request->input('type');
        $cheque_no = $request->input('cheque_no');
        $pay_before = $request->input('pay_before');
        $vendor_name = $request->input('vendor_name');
        $vendor_ic = $request->input('vendor_ic');
        $vendor_contact = $request->input('vendor_contact');
        $vendor_email = $request->input('vendor_email');
        $tenant_name = $request->input('tenant_name');
        $tenant_ic = $request->input('tenant_ic');
        $tenant_contact = $request->input('tenant_contact');
        $tenant_email = $request->input('tenant_email');
        $agent_vendor = $request->input('agent_vendor');
        $others_vendor_name = $request->input('others_vendor_name');
        $others_vendor_ic = $request->input('others_vendor_ic');
        $agent_tenant = $request->input('agent_tenant');
        $others_tenant_name = $request->input('others_tenant_name');
        $others_tenant_ic = $request->input('others_tenant_ic');
        $total = $request->input('total');
        $deduct_deposit = $request->input('deduct_deposit');
        $deduct_agreement = $request->input('deduct_agreement');
        $balance_to_paid = $request->input('balance_to_paid');

        $offer = Offer::find($otl_id);
        $offer->date_of_agreement = $date_of_agreement;
        $offer->property_address = $property_address;
        $offer->date_of_commencement = $date_of_commencement;
        $offer->tenancy_period = $tenancy_period;
        $offer->renewal_term = $renewal_term;
        $offer->monthly_rental = $monthly_rental;
        $offer->advance_rental = $advance_rental;
        $offer->security_deposit = $security_deposit;
        $offer->utility_deposit = $utility_deposit;
        $offer->agreement_fee = $agreement_fee;
        $offer->stamp_duty = $stamp_duty;
        $offer->type = $type;
        $offer->cheque_no = $cheque_no;
        $offer->pay_before = $pay_before;
        $offer->vendor_name = $vendor_name;
        $offer->vendor_ic = $vendor_ic;
        $offer->vendor_contact = $vendor_contact;
        $offer->vendor_email = $vendor_email;
        $offer->tenant_name = $tenant_name;
        $offer->tenant_ic = $tenant_ic;
        $offer->tenant_contact = $tenant_contact;
        $offer->tenant_email = $tenant_email;
        $offer->agentvendor_id = $agent_vendor;
        $offer->agenttenant_id = $agent_tenant;
        $offer->others_vendor_name = $others_vendor_name;
        $offer->others_vendor_ic = $others_vendor_ic;
        $offer->others_tenant_name = $others_tenant_name;
        $offer->others_tenant_ic = $others_tenant_ic;
        $offer->total = $total;
        $offer->deduct_deposit = $deduct_deposit;
        $offer->deduct_agreement = $deduct_agreement;
        $offer->balance_to_paid = $balance_to_paid;
        $offer->save();

        $id = $otl_id;

        \Session::flash('flash_message', 'successfully update otl');
        return Redirect::route('admineditotl', compact('id'));

    }
}
