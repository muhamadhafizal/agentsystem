<?php

namespace App\Http\Controllers;
use App\User;
use App\Area;
use App\Rental;
use DB;
use Redirect;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class RentalController extends Controller
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
    
    public function getmonthname($month){

        if($month == '1'){
            $monthname = 'January';
        } elseif($month == '2'){
            $monthname = 'February';
        } elseif($month == '3'){
            $monthname = 'March';
        } elseif($month == '4'){
            $monthname = 'April';
        } elseif($month == '5'){
            $monthname = 'Mei';
        } elseif($month == '6'){
            $monthname = 'June';
        } elseif($month == '7'){
            $monthname = 'July';
        } elseif($month == '8'){
            $monthname = 'August';
        } elseif($month == '9'){
            $monthname = 'September';
        } elseif($month == '10'){
            $monthname = 'October';
        } elseif($month == '11'){
            $monthname = 'November';
        } elseif($month == '12'){
            $monthname = 'December';
        }

        return $monthname;
 
    }

    public function getArea(){
        $area = Area::all();
        
        return $area;
    }

    public function getUser(){
        $user = User::where('role','agent')->where('status',0)->get();

        return $user;
    }

    public function getrentaldetails($id){

        $rentaldetails = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->where('rentals.id','=',$id)
            ->first();
        
        return $rentaldetails;

    }

    public function getcalculationpercent($agent,$fee,$sst,$commin,$netcomm, $sstagreementfee, $agreementfeeaftersst,$amountadminfee){

        $agentdetails = User::find($agent);
         
        //id
         $goponeid = $agentdetails->gopone;
         $goptwoid = $agentdetails->goptwo;
         $ipid = $agentdetails->ip;
         $leadid = $agentdetails->lead;
         $preleadid = $agentdetails->prelead;
        

        if($agentdetails->level != 'fullcomm'){
            
        $temppercentlead = 0;
        $temppercentprelead = 0;

        $ipuser = User::where('id',$agentdetails->ip)->first();
 
        if($ipuser){

            if($ipuser->level == 'lead' || $ipuser->level == 'fullcomm'){
                $percentip = 0.03;
            } elseif($ipuser->level == 'prelead'){
                $percentip = 0.05;
            } elseif($ipuser->level == 'consultant'){
                $percentip = 0.05;
            } else {
                $percentip = 0;
            }

        } else {
            $percentip = 0;
        }

        

        
        if($agentdetails->level == 'lead'){
            $percentcomm = 0.9;
        } elseif($agentdetails->level == 'prelead'){
            $percentcomm = 0.8;
            $temppercentlead = 0.1;
        } elseif($agentdetails->level == 'consultant'){
            $percentcomm = 0.7;
            $temppercentlead = 0.1;
            $temppercentprelead = 0.1;
        }

        
        
        $percentagent = round($netcomm * $percentcomm, 2);
        
        $percentip = round($percentagent * $percentip, 2);
        
        $percentgopone = round($percentagent * 0.02, 2);
        $percentgoptwo = round($percentagent * 0.02, 2);

        $percentlead = round($percentagent * $temppercentlead, 2);
        $percentprelead = round($percentagent * $temppercentprelead,2);

        $total = $sst + $percentagent + $percentip + $percentgopone + $percentgoptwo + $percentlead + $percentprelead;

        $profitcompany = $commin - $total;

        $totalpayoutcomm = $total - $sst + $agreementfeeaftersst;

        return ['percentagent'=>$percentagent, 
                'percentip'=>$percentip,
                'percentgopone'=>$percentgopone, 
                'percentgoptwo'=>$percentgoptwo, 
                'percentlead'=>$percentlead, 
                'percentprelead'=>$percentprelead, 
                'total'=>$total, 
                'profitcompany'=>$profitcompany,
                'totalpayoutcomm'=>$totalpayoutcomm,
                'goponeid' => $goponeid,
                'goptwoid' => $goptwoid,
                'ipid' => $ipid,
                'leadid' => $leadid,
                'preleadid' => $preleadid,
            ];
        } else {

            $percentagent = $netcomm;
            $percentip = 0.0;
            $percentgopone = 0.0;
            $percentgoptwo = 0.0;
            $percentlead = 0.0;
            $percentprelead = 0.0;

            $total = $sst + $percentagent + $percentip + $percentgopone + $percentgoptwo + $percentlead + $percentprelead;
            $profitcompany = $amountadminfee;
            $totalpayoutcomm = $percentagent - $sst - $amountadminfee + $agreementfeeaftersst;

            return ['percentagent'=>$percentagent, 
                'percentip'=>$percentip,
                'percentgopone'=>$percentgopone, 
                'percentgoptwo'=>$percentgoptwo, 
                'percentlead'=>$percentlead, 
                'percentprelead'=>$percentprelead, 
                'total'=>$total, 
                'profitcompany'=>$profitcompany,
                'totalpayoutcomm'=>$totalpayoutcomm,
                'goponeid' => $goponeid,
                'goptwoid' => $goptwoid,
                'ipid' => $ipid,
                'leadid' => $leadid,
                'preleadid' => $preleadid,
            ];


        }
   

    }

    //end public info

    public function index(){

        $user = $this->getInfo();

        if($user){
            $allrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->orderBy('rentals.date','DESC')
            ->get();
            $i = 1;
            
            return view('/admin/rental', compact('allrental','i'));
        } else {
            return redirect('/');
        }

    }

    public function addrental(){

        $user = $this->getInfo();
        $area = $this->getArea();
        $alluser = $this->getUser();

        if($user){
            return view('/admin/addrental', compact('area','alluser'));
        } else {
            return redirect('/');
        }

    }

    public function store(Request $request){

        $temppercentlead = 0;
        $temppercentprelead = 0;

        $num = $request->input('num');
        $date = $request->input('date');
        $area = $request->input('area');
        $address =$request->input('address');
        $tenantname = $request->input('tenantname');
        $tenantcontact = $request->input('tenantcontact');
        $tenantemail = $request->input('tenantemail');
        $ownername = $request->input('ownername');
        $ownercontact = $request->input('ownercontact');
        $owneremail = $request->input('owneremail');
        $fee = $request->input('fee');
        $sst = $request->input('sst');
        $agent = $request->input('agent');
        $category = $request->input('category');
        $status = $request->input('status');
        $stemduty = $request->input('stemduty');
        $agreementfee = $request->input('agreementfee');
        $commin = $request->input('commin');
        $netcomm = $request->input('netcomm');
        $gdp = $request->input('gdp');
        $sstagreementfee = $request->input('sstagreementfee');
        $agreementfeeaftersst = $request->input('agreementfeeaftersst');
        $adminfee = $request->input('adminfee');
        
        $agentdetails = User::find($agent);

        if($adminfee != null){
            $amountadminfee = $adminfee;
        } else {
            $amountadminfee = 0;
        }

        //sst
        $sstpercent = 0.08;
        if($date < '2024-03-01'){
            $sstpercent = 0.06;
        }
        $sst = $fee * $sstpercent;
        $netcomm = $commin - $sst;

        $tempresult = $this->getcalculationpercent($agent,$fee,$sst,$commin,$netcomm,$sstagreementfee,$agreementfeeaftersst,$amountadminfee);
        
        $rental = new Rental;
        $rental->num = $num;
        $rental->date = $date;
        $rental->area = $area;
        $rental->address = $address;
        $rental->category = $category;
        $rental->tenantname = $tenantname;
        $rental->tenantemail = $tenantemail;
        $rental->tenantcontact = $tenantcontact;
        $rental->ownername = $ownername;
        $rental->ownercontact = $ownercontact;
        $rental->owneremail = $owneremail;
        $rental->fee = $fee;
        $rental->agent = $agent;
        $rental->status = $status;
        $rental->percentsst = $sst;
        $rental->percentagent = $tempresult['percentagent'];
        $rental->percentlead = $tempresult['percentlead'];
        $rental->leadid = $tempresult['leadid'];
        $rental->percentprelead = $tempresult['percentprelead'];
        $rental->preleadid = $tempresult['preleadid'];
        $rental->percentip = $tempresult['percentip'];
        $rental->ipid = $tempresult['ipid'];
        $rental->percentgopone = $tempresult['percentgopone'];
        $rental->goponeid = $tempresult['goponeid'];
        $rental->percentgoptwo = $tempresult['percentgoptwo'];
        $rental->goptwoid = $tempresult['goptwoid'];
        $rental->total = $tempresult['total'];
        $rental->profitcompany = $tempresult['profitcompany'];
        $rental->stemduty = $stemduty;
        $rental->agreementfee = $agreementfee;
        $rental->commin = $commin;
        $rental->netcomm = $netcomm;
        $rental->totalpayoutcomm = $tempresult['totalpayoutcomm'];
        $rental->gdp = $gdp;
        $rental->agreementfeeaftersst = $agreementfeeaftersst;
        $rental->sstagreementfee = $sstagreementfee;
        $rental->adminfee = $amountadminfee;

        $rental->save();

        \Session::flash('flash_message', 'successfully add rental');
        return Redirect::route('allrentals');

    }

    public function show($id){

        $rentaldetails = $this->getrentaldetails($id);
   
        if($rentaldetails->category == '1'){
            $category  = 'Rental';
        } else {
            $category = 'Subsale';
        }

       
        return view('/admin/detailsrental', compact('rentaldetails','category'));

    }

    public function edit($id,$type){

        $rentaldetails = $this->getrentaldetails($id);
        $area = $this->getArea();
        $alluser = $this->getUser();

        if($rentaldetails->category == '1'){
            $category  = 'Rental';
        } else {
            $category = 'Subsale';
        }

        return view('/admin/editrental', compact('rentaldetails','category','area','alluser','type'));
        

    }

    public function update(Request $request,$id){

        $num = $request->input('num');
        $date = $request->input('date');
        $area = $request->input('area');
        $address = $request->input('address');
        $ownername = $request->input('ownername');
        $ownercontact = $request->input('ownercontact');
        $owneremail = $request->input('owneremail');
        $tenantname = $request->input('tenantname');
        $tenantcontact = $request->input('tenantcontact');
        $tenantemail = $request->input('tenantemail');
        $fee = $request->input('fee');
        $sst = $request->input('sst');
        $agent = $request->input('agent');
        $category = $request->input('category');
        $status = $request->input('status');
        $type = $request->input('type');
        $stemduty = $request->input('stemduty');
        $agreementfee = $request->input('agreementfee');
        $commin = $request->input('commin');
        $netcomm = $request->input('netcomm');
        $gdp = $request->input('gdp');
        $sstagreementfee = $request->input('sstagreementfee');
        $agreementfeeaftersst = $request->input('agreementfeeaftersst');
        $adminfee = $request->input('adminfee');

        if($adminfee != null){
            $amountadminfee = $adminfee;
        } else {
            $amountadminfee = 0;
        }

        //sst
        $sstpercent = 0.08;
        if($date < '2024-03-01'){
            $sstpercent = 0.06;
        }
        $sst = $fee * $sstpercent;
        $netcomm = $commin - $sst;

        $tempresult = $this->getcalculationpercent($agent,$fee,$sst,$commin,$netcomm,$sstagreementfee,$agreementfeeaftersst,$amountadminfee);
      
        $rental = Rental::find($id);

        $rental->num = $num;
        $rental->date = $date;
        $rental->area = $area;
        $rental->address = $address;
        $rental->category = $category;
        $rental->ownername = $ownername;
        $rental->owneremail = $owneremail;
        $rental->ownercontact = $ownercontact;
        $rental->tenantname = $tenantname;
        $rental->tenantemail = $tenantemail;
        $rental->tenantcontact = $tenantcontact;
        $rental->fee = $fee;
        $rental->agent = $agent;
        $rental->status = $status;
        $rental->percentsst = $sst;
        $rental->percentagent = $tempresult['percentagent'];
        $rental->percentlead = $tempresult['percentlead'];
        $rental->leadid = $tempresult['leadid'];
        $rental->percentprelead = $tempresult['percentprelead'];
        $rental->preleadid = $tempresult['preleadid'];
        $rental->percentip = $tempresult['percentip'];
        $rental->ipid = $tempresult['ipid'];
        $rental->percentgopone = $tempresult['percentgopone'];
        $rental->goponeid = $tempresult['goponeid'];
        $rental->percentgoptwo = $tempresult['percentgoptwo'];
        $rental->goptwoid = $tempresult['goptwoid'];
        $rental->total = $tempresult['total'];
        $rental->profitcompany = $tempresult['profitcompany'];
        $rental->stemduty = $stemduty;
        $rental->agreementfee = $agreementfee;
        $rental->commin = $commin;
        $rental->netcomm = $netcomm;
        $rental->totalpayoutcomm = $tempresult['totalpayoutcomm'];
        $rental->gdp = $gdp;
        $rental->sstagreementfee = $sstagreementfee;
        $rental->agreementfeeaftersst = $agreementfeeaftersst;

        $rental->save();

        \Session::flash('flash_message', 'successfully updated.');

        if($type == 'main'){
            return Redirect::route('detailsrental', compact('id'));
        } elseif ($type == 'month'){
            return Redirect::route('detailsrentalmonth', compact('id'));
        }
        

    }

    public function destroy($id,$type){

        $rental = Rental::find($id);
        $rental->delete($rental->id);

        $month = date('m', strtotime($rental->date));
        $year = date("Y", strtotime($rental->date));

         \Session::flash('flash_message_delete', 'successfully deleted.');
        if($type == 'month'){
            return Redirect::route('getmonth', compact('month','year'));
        } elseif($type == 'main'){
            return Redirect::route('allrentals');
        }

    }


    public function listmonth(){

        $user = $this->getInfo();

        if($user){
            return view('/admin/listmonth');
        } else {
            return redirect('/');
        }

    }

    public function getmonth($month = '', $year = ''){

        $user = $this->getInfo();
        $totalprofit = 0;
        $totalsst = 0;
        $totalgdp = 0;
        $totalpayoutcomm = 0;
        $agreementsst = 0;

        if($user){
            
            $monthname = $this->getmonthname($month);

            $allrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->whereYear('rentals.date','=',$year)
            ->whereMonth('rentals.date','=', $month)
            ->orderBy('rentals.date','DESC')
            ->get();

            $cardrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->whereYear('rentals.date','=',$year)
            ->whereMonth('rentals.date','=',$month)
            ->where('rentals.status','=','success')
            ->orderBy('rentals.date','DESC')
            ->get();

            $rentalcount = count($cardrental);
            foreach ($cardrental as $data){
                $totalprofit = $totalprofit + $data->profitcompany;
                $totalsst = $totalsst + $data->percentsst;
                $totalgdp = $totalgdp + $data->gdp;
                $totalpayoutcomm = $totalpayoutcomm + $data->totalpayoutcomm;
                $agreementsst = $agreementsst + $data->sstagreementfee;
            }

            $i = 1;

            return view('/admin/monthinfo', compact('monthname','allrental','i','rentalcount','totalprofit','totalsst','totalgdp','totalpayoutcomm','month','year','agreementsst'));
           

        } else {
            return redirect('/');
        }

    }

    public function detailsmonth($id){

        $rentaldetails = $this->getrentaldetails($id);

        if($rentaldetails->category == '1'){
            $category = 'Rental';
        } else {
            $category = 'Subsale';
        }

        $month = date('m', strtotime($rentaldetails->date));
        $year = date("Y", strtotime($rentaldetails->date));

        return view('/admin/detailsrentalmonth', compact('rentaldetails','category','month','year'));

    }

    public function getyearadminrental(Request $request){
        $year = $request->input('year');

        if($year == null){
            $year = '2020';
        }

        return view('/admin/listmonthyear', compact('year'));
    }

    public function paymentvoucher($id, $type){

            
        $agentarray = array();
        $finalarray = array();

        $details = Rental::find($id);

        array_push($agentarray,$details->agent);

        if(!in_array($details->leadid,$agentarray)){
            array_push($agentarray,$details->leadid);
        }

        if(!in_array($details->preleadid,$agentarray)){
            array_push($agentarray,$details->preleadid);
        }

        if(!in_array($details->ipid,$agentarray)){
            array_push($agentarray,$details->ipid);
        }

        if(!in_array($details->goponeid,$agentarray)){
            array_push($agentarray,$details->goponeid);
        }

        if(!in_array($details->goptwoid,$agentarray)){
            array_push($agentarray,$details->goptwoid);
        }
        //print_r($agentarray);
        foreach($agentarray as $data){

            $userdetails = User::find($data);
            
            if($userdetails){

                $temparray = [
                    'id' => $userdetails->id,
                    'nickname' => $userdetails->nickname,
                ];
    
                array_push($finalarray,$temparray);

            }
           
        }



        $i = 1;
        
        return view('/admin/listpaymentvoucher', compact('finalarray','type','i','id'));

    }

    public function detailspaymentvoucher($id,$caseid,$listid){
        
        $detailsrental = Rental::find($caseid);
        $agentinfo = User::find($id);

        $commarray = array();

        $totalcomm = 0;
        $commagent = 0;
        $commlead = 0;
        $commprelead = 0;
        $commip = 0;
        $commgopone = 0;
        $commgoptwo = 0;

        if($id == $detailsrental->agent){
            $commagent = $detailsrental->percentagent;
            $totalcomm = $totalcomm + $detailsrental->percentagent;

            $temparray = [
                'name' => 'commission agent',
                'amount' => $commagent,
            ];

            array_push($commarray,$temparray);
        }
        if($id == $detailsrental->leadid){
            $commlead = $detailsrental->percentlead;
            $totalcomm = $totalcomm + $detailsrental->percentlead;

            $temparray = [
                'name' => 'commission leader',
                'amount' => $commlead,
            ];

            array_push($commarray,$temparray);
        }
        if($id == $detailsrental->preleadid){
            $commprelead = $detailsrental->percentprelead;
            $totalcomm = $totalcomm + $detailsrental->percentprelead;

            $temparray = [
                'name' => 'commission preleader',
                'amount' => $commprelead,
            ];

            array_push($commarray,$temparray);
        }
        if($id == $detailsrental->ipid){
            $commip = $detailsrental->percentip;
            $totalcomm = $totalcomm + $detailsrental->percentip;

            $temparray = [
                'name' => 'commission ip',
                'amount' => $commip,
            ];

            array_push($commarray,$temparray);
        }
        if($id == $detailsrental->goponeid){
            $commgopone = $detailsrental->percentgopone;
            $totalcomm = $totalcomm + $detailsrental->percentgopone;

            $temparray = [
                'name' => 'commission gop one',
                'amount' => $commgopone,
            ];

            array_push($commarray,$temparray);
        }
        if($id == $detailsrental->goptwoid){
            $commgoptwo = $detailsrental->percentgoptwo;
            $totalcomm = $totalcomm + $detailsrental->percentgoptwo;

            $temparray = [
                'name' => 'commission gop two',
                'amount' => $commgoptwo,
            ];

            array_push($commarray,$temparray);
        }

        $formatdate = date("d-M-Y", strtotime($detailsrental->date));
        $currentYear = date("Y");

    
        $tempnumber = $detailsrental->id.$listid;
        $gennumber = str_pad($tempnumber,4,'0', STR_PAD_LEFT);

        $voucherno = 'MW/'.$currentYear.'/'.$gennumber;

        
        return view('/admin/voucherrentaldetails', compact('commarray','totalcomm','agentinfo','formatdate','detailsrental','voucherno'));
        

        
    }
}

