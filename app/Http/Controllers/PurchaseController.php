<?php

namespace App\Http\Controllers;
use App\User;
use App\Purchase;
use Illuminate\Http\Request;
use Redirect;

class PurchaseController extends Controller
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

        $purchases = Purchase::where('status',0)
                    ->where(function($query) use($agentinfo){
                        $query->where('agentvendor_id',$agentinfo->id)
                        ->orWhere('agenttenant_id',$agentinfo->id)
                        ->orWhere('agent_id',$agentinfo->id);
                    })
                    ->orderby('created_at','desc')
                    ->get();

        $i = 1;
        
        return view('agent/otp/index', compact('purchases','i'));

    }

    public function add(){

        $alluser = User::where('role','agent')->get();
        return view('agent/otp/add', compact('alluser'));

    }

    public function store(Request $request){

        $agentinfo = $this->getinfo();

        $otp_num = $request->input('otp_num');
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
        $stakeholder = $request->input('stakeholder');

         //otp number
         $purchases = Purchase::all();
         $total = count($purchases);
 
         $temp_cp_num = $total + 1;
 
         $otp_num = str_pad($temp_cp_num, 4, '0', STR_PAD_LEFT);

        $purchase = new Purchase;
        $purchase->otp_num = $otp_num;
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
        $purchase->agent_id = $agentinfo->id;
        $purchase->status = 0;
        $purchase->stakeholder = $stakeholder;
        $purchase->save();

        \Session::flash('flash_message', 'successfully save otp');
        return Redirect::route('agentlistotp');


    }

    public function details($id){

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

        return view('agent/otp/details', compact('details','id','vendorname','vendoric','tenantname','tenantic'));

    }

    public function edit($id){

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
        return view('agent/otp/edit', compact('alluser','details','vendor_name','tenant_name'));

    }

    public function update(Request $request){

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
        $stakeholder = $request->input('stakeholder');

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
        $purchase->stakeholder = $stakeholder;
        $purchase->save();

        $id = $otp_id;

        \Session::flash('flash_message', 'successfully update otp');
        return Redirect::route('editotp', compact('id'));

    }
}
