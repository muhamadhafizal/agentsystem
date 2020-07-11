<?php

namespace App\Http\Controllers;
use App\User;
use App\Area;
use App\Rental;
use DB;
use Redirect;
use Illuminate\Http\Request;

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
        $user = User::where('role','agent')->get();

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

    public function getcalculationpercent($agent,$fee,$sst,$commin,$netcomm){
        
        $temppercentlead = 0;
        $temppercentprelead = 0;

        $agentdetails = User::find($agent);
        
        if($agentdetails->level == 'lead'){
            $percentcomm = 0.9;
            $percentip = 0.03;
        } elseif($agentdetails->level == 'prelead'){
            $percentcomm = 0.8;
            $percentip = 0.05;
            $temppercentlead = 0.1;
        } elseif($agentdetails->level == 'consultant'){
            $percentcomm = 0.7;
            $percentip = 0.05;
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

        $totalpayoutcomm = $total - $sst;

        return ['percentagent'=>$percentagent, 
                'percentip'=>$percentip,
                'percentgopone'=>$percentgopone, 
                'percentgoptwo'=>$percentgoptwo, 
                'percentlead'=>$percentlead, 
                'percentprelead'=>$percentprelead, 
                'total'=>$total, 
                'profitcompany'=>$profitcompany,
                'totalpayoutcomm'=>$totalpayoutcomm];
   

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
        $tenantname = $request->input('tenantname');
        $tenantcontact = $request->input('tenantcontact');
        $tenantemail = $request->input('tenantemail');
        $fee = $request->input('fee');
        $sst = $request->input('sst');
        $agent = $request->input('agent');
        $category = $request->input('category');
        $status = $request->input('status');
        $stemduty = $request->input('stemduty');
        $agreementfee = $request->input('agreementfee');
        $commin = $request->input('commin');
        $netcomm = $request->input('netcomm');
        
        $agentdetails = User::find($agent);
        
        if($agentdetails->level == 'lead'){
            $percentcomm = 0.9;
            $percentip = 0.03;
        } elseif($agentdetails->level == 'prelead'){
            $percentcomm = 0.8;
            $percentip = 0.05;
            $temppercentlead = 0.1;
        } elseif($agentdetails->level == 'consultant'){
            $percentcomm = 0.7;
            $percentip = 0.05;
            $temppercentlead = 0.1;
            $temppercentprelead = 0.1;
        }

        $tempresult = $this->getcalculationpercent($agent,$fee,$sst,$commin,$netcomm);
        
        $rental = new Rental;
        $rental->num = $num;
        $rental->date = $date;
        $rental->area = $area;
        $rental->category = $category;
        $rental->tenantname = $tenantname;
        $rental->tenantemail = $tenantemail;
        $rental->tenantcontact = $tenantcontact;
        $rental->fee = $fee;
        $rental->agent = $agent;
        $rental->status = $status;
        $rental->percentsst = $sst;
        $rental->percentagent = $tempresult['percentagent'];
        $rental->percentlead = $tempresult['percentlead'];
        $rental->percentprelead = $tempresult['percentprelead'];
        $rental->percentip = $tempresult['percentip'];
        $rental->percentgopone = $tempresult['percentgopone'];
        $rental->percentgoptwo = $tempresult['percentgoptwo'];
        $rental->total = $tempresult['total'];
        $rental->profitcompany = $tempresult['profitcompany'];
        $rental->stemduty = $stemduty;
        $rental->agreementfee = $agreementfee;
        $rental->commin = $commin;
        $rental->netcomm = $netcomm;
        $rental->totalpayoutcomm = $tempresult['totalpayoutcomm'];

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

        $tempresult = $this->getcalculationpercent($agent,$fee,$sst,$commin,$netcomm);
      
        $rental = Rental::find($id);

        $rental->num = $num;
        $rental->date = $date;
        $rental->area = $area;
        $rental->category = $category;
        $rental->tenantname = $tenantname;
        $rental->tenantemail = $tenantemail;
        $rental->tenantcontact = $tenantcontact;
        $rental->fee = $fee;
        $rental->agent = $agent;
        $rental->status = $status;
        $rental->percentsst = $sst;
        $rental->percentagent = $tempresult['percentagent'];
        $rental->percentlead = $tempresult['percentlead'];
        $rental->percentprelead = $tempresult['percentprelead'];
        $rental->percentip = $tempresult['percentip'];
        $rental->percentgopone = $tempresult['percentgopone'];
        $rental->percentgoptwo = $tempresult['percentgoptwo'];
        $rental->total = $tempresult['total'];
        $rental->profitcompany = $tempresult['profitcompany'];
        $rental->stemduty = $stemduty;
        $rental->agreementfee = $agreementfee;
        $rental->commin = $commin;
        $rental->netcomm = $netcomm;
        $rental->totalpayoutcomm = $tempresult['totalpayoutcomm'];

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

        if($user){
            
            $monthname = $this->getmonthname($month);

            $allrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->whereYear('rentals.date','=',$year)
            ->whereMonth('rentals.date','=', $month)
            ->orderBy('rentals.date','DESC')
            ->get();

            $rentalcount = count($allrental);
            foreach ($allrental as $data){
                $totalprofit = $totalprofit + $data->profitcompany;
                $totalsst = $totalsst + $data->percentsst;
            }

            $i = 1;

            return view('/admin/monthinfo', compact('monthname','allrental','i','rentalcount','totalprofit','totalsst'));
           

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
}
