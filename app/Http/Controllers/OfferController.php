<?php

namespace App\Http\Controllers;
use App\User;
use App\Offer;
use Illuminate\Http\Request;
use Redirect;

class OfferController extends Controller
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
        
        $agentinfo = $this->getinfo();

        $offers = Offer::where('status',0)
                    ->where(function($query) use($agentinfo){
                        $query->where('agentvendor_id',$agentinfo->id)
                        ->orWhere('agenttenant_id',$agentinfo->id)
                        ->orWhere('agent_id',$agentinfo->id);
                    })
                    ->orderby('created_at','desc')
                    ->get();

        $i = 1;
        
        return view('agent/otl/index', compact('offers','i'));

    }

    public function add(){

        $alluser = User::where('role','agent')->get();
        return view('agent/otl/add', compact('alluser'));
    }

    public function store(Request $request){

        $agentinfo = $this->getinfo();
        $date_of_agreement = $request->input('date_of_agreement');
        $property_address = $request->input('property_address');
        $date_of_commencement = $request->input('date_of_commencement');
        $end_date_of_commencement = $request->input('end_date_of_commencement');
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

        if($agent_vendor == 0 && $agent_tenant == 0){
            \Session::flash('flash_message_delete', 'OTL form noted save, please choose agent landlord / agent tenant');
            return Redirect::route('addotl');
        } else {

        //otl number
        $offers = Offer::all();
        $total = count($offers);

        $temp_cp_num = $total + 1;

        $otl_num = str_pad($temp_cp_num, 4, '0', STR_PAD_LEFT);

        $offer = new Offer;
        $offer->agent_id = $agentinfo->id;
        $offer->status = 0;
        $offer->otl_no = $otl_num;
        $offer->date_of_agreement = $date_of_agreement;
        $offer->property_address = $property_address;
        $offer->date_of_commencement = $date_of_commencement;
        $offer->end_date_of_commencement = $end_date_of_commencement;
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

        \Session::flash('flash_message', 'successfully save otp');
        return Redirect::route('agentlistotl');
        }

    }

    public function details($id){
        
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

        $startdatecommencement = date("d/m/Y", strtotime($details->date_of_commencement));

        if($details->end_date_of_commencement){
            $enddatecommencement = date("d/m/Y", strtotime($details->end_date_of_commencement));
        } else {
            $enddatecommencement = ' ';
        }
      

        return view('agent/otl/details', compact('details','vendorname','vendoric','tenantname','tenantic','startdatecommencement','enddatecommencement'));
    }

    public function edit($id){

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
        return view('agent/otl/edit', compact('alluser','details','vendor_name','tenant_name'));

    }

    public function update(Request $request){

        $otl_id = $request->input('otl_id');
        $date_of_agreement = $request->input('date_of_agreement');
        $property_address = $request->input('property_address');
        $date_of_commencement = $request->input('date_of_commencement');
        $end_date_of_commencement = $request->input('end_date_of_commencement');
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

        if($agent_vendor == 0 && $agent_tenant == 0){
            \Session::flash('flash_message_delete', 'OTL form noted save, please choose agent landlord / agent tenant');
        } else {

        $offer = Offer::find($otl_id);
        $offer->date_of_agreement = $date_of_agreement;
        $offer->property_address = $property_address;
        $offer->date_of_commencement = $date_of_commencement;
        $offer->end_date_of_commencement = $end_date_of_commencement;
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

        \Session::flash('flash_message', 'successfully update otl');
        }
        $id = $otl_id;
        return Redirect::route('editotl', compact('id'));

    }
}
