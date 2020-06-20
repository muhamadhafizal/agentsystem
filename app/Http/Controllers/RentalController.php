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
            ->join('areas','areas.id','=','rentals.area')
            ->select('rentals.*','users.nickname as nickname','areas.name as name')
            ->where('rentals.id','=',$id)
            ->first();
        
        return $rentaldetails;

    }

    public function getcalculationpercent($agent,$fee,$sst){
        
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

        $gross = $fee - $sst;
        $percentagent = $gross * $percentcomm;

        $percentip = $percentagent * $percentip;
        $percentgopone = $percentagent * 0.02;
        $percentgoptwo = $percentagent * 0.02;

        $percentlead = $percentagent * $temppercentlead;
        $percentprelead = $percentagent * $temppercentprelead;

        $total = $sst + $percentagent + $percentip + $percentgopone + $percentgoptwo + $percentlead + $percentprelead;

        $profitcompany = $fee - $total;

        return ['percentagent'=>$percentagent, 'percentip'=>$percentip, 'percentgopone'=>$percentgopone, 'percentgoptwo'=>$percentgoptwo, 'percentlead'=>$percentlead, 'percentprelead'=>$percentprelead, 'total'=>$total, 'profitcompany'=>$profitcompany];
   

    }

    //end public info

    public function index(){

        $user = $this->getInfo();

        if($user){
            $allrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->join('areas','areas.id','=','rentals.area')
            ->select('rentals.*','users.nickname as nickname','areas.name as name')
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

        $gross = $fee - $sst;
        $percentagent = $gross * $percentcomm;

        $percentip = $percentagent * $percentip;
        $percentgopone = $percentagent * 0.02;
        $percentgoptwo = $percentagent * 0.02;

        $percentlead = $percentagent * $temppercentlead;
        $percentprelead = $percentagent * $temppercentprelead;

        $total = $sst + $percentagent + $percentip + $percentgopone + $percentgoptwo + $percentlead + $percentprelead;

        $profitcompany = $fee - $total;
        
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
        $rental->percentagent = $percentagent;
        $rental->percentlead = $percentlead;
        $rental->percentprelead = $percentprelead;
        $rental->percentip = $percentip;
        $rental->percentgopone = $percentgopone;
        $rental->percentgoptwo = $percentgoptwo;
        $rental->total = $total;
        $rental->profitcompany = $profitcompany;

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

    public function edit($id){

        $rentaldetails = $this->getrentaldetails($id);
        $area = $this->getArea();
        $alluser = $this->getUser();

        if($rentaldetails->category == '1'){
            $category  = 'Rental';
        } else {
            $category = 'Subsale';
        }
        return view('/admin/editrental', compact('rentaldetails','category','area','alluser'));
        

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

        $tempresult = $this->getcalculationpercent($agent,$fee,$sst);
       
        $tempresult['percentip'];
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

        $rental->save();

        \Session::flash('flash_message', 'successfully updated.');
        return Redirect::route('detailsrental', compact('id'));

    }

    public function destroy($id){

        $rental = Rental::find($id);
        $rental->delete($rental->id);

        \Session::flash('flash_message_delete', 'successfully deleted.');
        return Redirect::route('allrentals');

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

        if($user){
            
            $monthname = $this->getmonthname($month);

            return view('/admin/monthinfo', compact('monthname'));
           

        } else {
            return redirect('/');
        }

    }
}
