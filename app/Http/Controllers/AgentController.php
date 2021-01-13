<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use App\Rental;
use DB;

class AgentController extends Controller
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

    public function getagentdetails($id){

        $userdetails = User::find($id);
        return $userdetails;

    }

    public function getrentaldetails($id){

        $rentaldetails = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->where('rentals.id','=',$id)
            ->first();
        
        return $rentaldetails;

    }

    public function getlistuser($user){

        $listUser = User::select('id')
                        ->where('lead',$user->id)
                        ->orWhere('prelead',$user->id)
                        ->orWhere('gopone',$user->id)
                        ->orWhere('goptwo',$user->id)
                        ->get();
        
        $tempUser = array();

        foreach($listUser as $data){
            array_push($tempUser,$data->id);
        }
        
        return $tempUser;

    }

    public function getagentcomm($rentalid,$userid){
        
            $rentaldetails = $this->getrentaldetails($rentalid);
            
            $commagent = 0;

            if($userid == $rentaldetails->agent){
                $commagent = $commagent + $rentaldetails->percentagent;
            }

            if($userid == $rentaldetails->leadid){
                $commagent = $commagent + $rentaldetails->percentlead;
            }

            if($userid == $rentaldetails->preleadid){
                $commagent = $commagent + $rentaldetails->percentprelead;
            }

            if($userid == $rentaldetails->ipid){
                $commagent = $commagent + $rentaldetails->percentip;
            }

            if($userid == $rentaldetails->goponeid){
                $commagent = $commagent + $rentaldetails->percentgopone;
            }

            if($userid == $rentaldetails->goptwoid){
                $commagent = $commagent + $rentaldetails->percentgoptwo;
            }

            return $commagent;

    }

    //end get

    public function index(){

        $user = $this->getInfo();
        $totalprocess = 0;
        $totalsuccess = 0;

        if($user){
            
            $year = date("Y");

            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->select('rentals.*','users.nickname as nickname')
                    ->whereYear('rentals.date','=',$year)
                    ->where('rentals.status','!=', 'cancel')
                    ->where(function ($query) use($user){
                        $query->where('rentals.agent',$user->id)
                              ->orWhere('rentals.leadid', $user->id)
                              ->orWhere('rentals.preleadid', $user->id)
                              ->orWhere('rentals.ipid', $user->id)
                              ->orWhere('rentals.goponeid', $user->id)
                              ->orWhere('rentals.goptwoid', $user->id);
                        })
                    ->orderBy('rentals.date','DESC')
                    ->get();
            
            //cardcalculation
            $cases = count($rental);

            foreach($rental as $data){
                
                $commagent = 0;
                $total = 0;

                if($user->id == $data->agent){
                    $commagent = $commagent + $data->percentagent;
                }
    
                if($user->id == $data->leadid){
                    $commagent = $commagent + $data->percentlead;
                }
    
                if($user->id == $data->preleadid){
                    $commagent = $commagent + $data->percentprelead;
                }
    
                if($user->id == $data->ipid){
                    $commagent = $commagent + $data->percentip;
                }
    
                if($user->id == $data->goponeid){
                    $commagent = $commagent + $data->percentgopone;
                }
    
                if($user->id == $data->goptwoid){
                    $commagent = $commagent + $data->percentgoptwo;
                }

                $total = $commagent;

                if($data->status == 'success'){
                    $totalsuccess = $totalsuccess + $total;
                } elseif ($data->status == 'process'){
                    $totalprocess = $totalprocess + $total;
                }

            }

            return view('agent/index', compact('totalprocess','totalsuccess','cases'));
        } else {
            return redirect('/');
        }

    }

    public function indexyear($year){

        $user = $this->getInfo();
        $totalprocess = 0;
        $totalsuccess = 0;

        if($user){
            
            $year = $year;

            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->select('rentals.*','users.nickname as nickname')
                    ->whereYear('rentals.date','=',$year)
                    ->where('rentals.status','!=', 'cancel')
                    ->where(function ($query) use($user){
                        $query->where('rentals.agent',$user->id)
                              ->orWhere('rentals.leadid', $user->id)
                              ->orWhere('rentals.preleadid', $user->id)
                              ->orWhere('rentals.ipid', $user->id)
                              ->orWhere('rentals.goponeid', $user->id)
                              ->orWhere('rentals.goptwoid', $user->id);
                        })
                    ->orderBy('rentals.date','DESC')
                    ->get();
            
            //cardcalculation
            $cases = count($rental);

            foreach($rental as $data){
                
                $commagent = 0;
                $total = 0;

                if($user->id == $data->agent){
                    $commagent = $commagent + $data->percentagent;
                }
    
                if($user->id == $data->leadid){
                    $commagent = $commagent + $data->percentlead;
                }
    
                if($user->id == $data->preleadid){
                    $commagent = $commagent + $data->percentprelead;
                }
    
                if($user->id == $data->ipid){
                    $commagent = $commagent + $data->percentip;
                }
    
                if($user->id == $data->goponeid){
                    $commagent = $commagent + $data->percentgopone;
                }
    
                if($user->id == $data->goptwoid){
                    $commagent = $commagent + $data->percentgoptwo;
                }

                $total = $commagent;

                if($data->status == 'success'){
                    $totalsuccess = $totalsuccess + $total;
                } elseif ($data->status == 'process'){
                    $totalprocess = $totalprocess + $total;
                }

            }
        
            $finalarray = [
                'totalprocess' => number_format($totalprocess,2,'.',''),
                'totalsuccess' => number_format($totalsuccess,2,'.',''),
                'cases' => $cases,
            ];

            return response()->json($finalarray);

        } else {
            return redirect('/');
        }

    }

    public function listrental(){

        $user = $this->getInfo();
        $finalarray = array();

        if($user == null){
            return redirect('/');
        } else {
            
            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->select('rentals.*','users.nickname as nickname')
                    ->where('rentals.agent',$user->id)
                    ->orWhere('rentals.leadid', $user->id)
                    ->orWhere('rentals.preleadid', $user->id)
                    ->orWhere('rentals.ipid', $user->id)
                    ->orWhere('rentals.goponeid', $user->id)
                    ->orWhere('rentals.goptwoid', $user->id)
                    ->orderBy('rentals.date','DESC')
                    ->get();
            
            foreach($rental as $data){
                 $commagent = $this->getagentcomm($data->id,$user->id);

                 $temparray = [
                     'id' => $data->id,
                     'date' => $data->date,
                     'num' => $data->num,
                     'address' => $data->address,
                     'nickname' => $data->nickname,
                     'commagent' => $commagent,
                     'status' => $data->status,  
                 ];

                 array_push($finalarray,$temparray);
            }

            $i = 1;
         
            return view('agent/agentlistrental', compact('rental','i','finalarray'));
        }

    }

    public function details($id,$type){

        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $rentaldetails = $this->getrentaldetails($id);
            
            $commagent = 0;

            if($user->id == $rentaldetails->agent){
                $commagent = $commagent + $rentaldetails->percentagent;
            }

            if($user->id == $rentaldetails->leadid){
                $commagent = $commagent + $rentaldetails->percentlead;
            }

            if($user->id == $rentaldetails->preleadid){
                $commagent = $commagent + $rentaldetails->percentprelead;
            }

            if($user->id == $rentaldetails->ipid){
                $commagent = $commagent + $rentaldetails->percentip;
            }

            if($user->id == $rentaldetails->goponeid){
                $commagent = $commagent + $rentaldetails->percentgopone;
            }

            if($user->id == $rentaldetails->goptwoid){
                $commagent = $commagent + $rentaldetails->percentgoptwo;
            }

            if($rentaldetails->category == '1'){
                $category  = 'Rental';
            } else {
                $category = 'Subsale';
            }

            $month = date("m",strtotime($rentaldetails->date));
            $year = date("Y",strtotime($rentaldetails->date));

            return view('agent/agentdetailsrental', compact('rentaldetails','commagent','category','type','month','year'));

        }

    }
    

    public function listmonth(){

        $user = $this->getInfo();

        if($user){
            return view('agent/agentlistmonth');
        } else {
            return redirect('/');
        }

    }

    public function getmonth($month = '', $year = ''){

        $user = $this->getInfo();
        $totalprocess = 0;
        $totalsuccess = 0;
        $finalarray = array();

        if($user == null){
            return redirect('/');
        } else {
                
                $rental = DB::table('rentals')
                        ->join('users','users.id','=', 'rentals.agent')
                        ->select('rentals.*','users.nickname as nickname')
                        ->whereYear('rentals.date','=',$year)
                        ->whereMonth('rentals.date','=',$month)
                        ->where(function ($query) use($user){
                            $query->where('rentals.agent',$user->id)
                                  ->orWhere('rentals.leadid', $user->id)
                                  ->orWhere('rentals.preleadid', $user->id)
                                  ->orWhere('rentals.ipid', $user->id)
                                  ->orWhere('rentals.goponeid', $user->id)
                                  ->orWhere('rentals.goptwoid', $user->id);
                        })
                        ->orderBy('rentals.date','DESC')
                        ->get();

             foreach($rental as $data){
                 $commagent = $this->getagentcomm($data->id,$user->id);

                 $temparray = [
                     'id' => $data->id,
                     'date' => $data->date,
                     'num' => $data->num,
                     'address' => $data->address,
                     'nickname' => $data->nickname,
                     'commagent' => $commagent,
                     'status' => $data->status,  
                 ];

                 array_push($finalarray,$temparray);
            }

            //cardcalculation
            $cases = count($rental);

            foreach($rental as $data){
                
                $commagent = 0;
                $total = 0;

                if($user->id == $data->agent){
                    $commagent = $commagent + $data->percentagent;
                }
    
                if($user->id == $data->leadid){
                    $commagent = $commagent + $data->percentlead;
                }
    
                if($user->id == $data->preleadid){
                    $commagent = $commagent + $data->percentprelead;
                }
    
                if($user->id == $data->ipid){
                    $commagent = $commagent + $data->percentip;
                }
    
                if($user->id == $data->goponeid){
                    $commagent = $commagent + $data->percentgopone;
                }
    
                if($user->id == $data->goptwoid){
                    $commagent = $commagent + $data->percentgoptwo;
                }

                $total = $commagent;

                if($data->status == 'success'){
                    $totalsuccess = $totalsuccess + $total;
                } elseif ($data->status == 'process'){
                    $totalprocess = $totalprocess + $total;
                }

            }
            
            $i = 1;
            $monthname = $this->getmonthname($month);

            return view('agent/agentmonthinfo', compact('monthname','rental','i','totalprocess','totalsuccess','cases','finalarray'));

        }

    }

    public function chartrentalyear($year){

        $user = $this->getInfo();
        $monthArray = [];
        $year = $year;

        $totalJan = 0;
        $totalFeb = 0;
        $totalMac = 0;
        $totalApril = 0;
        $totalMei = 0;
        $totalJune = 0;
        $totalJuly = 0;
        $totalAugust = 0;
        $totalSept = 0;
        $totalOct = 0;
        $totalNov = 0;
        $totalDec = 0;

        $tempChart = DB::table('rentals')
                ->join('users','users.id','=', 'rentals.agent')
                ->select('rentals.*','users.nickname as nickname')
                ->whereYear('rentals.date','=',$year)
                ->where('rentals.status','=', 'success')
                ->where(function ($query) use($user){
                        $query->where('rentals.agent',$user->id)
                              ->orWhere('rentals.leadid', $user->id)
                              ->orWhere('rentals.preleadid', $user->id)
                              ->orWhere('rentals.ipid', $user->id)
                              ->orWhere('rentals.goponeid', $user->id)
                              ->orWhere('rentals.goptwoid', $user->id);
                        })
                ->get();
            
        foreach($tempChart as $data){

            $tempdate = $data->date;
            $d = date_parse_from_format("Y-m-d", $tempdate);

            $commagent = 0;
            $comm = 0;

            if($user->id == $data->agent){
                $commagent = $commagent + $data->percentagent;
            }
    
            if($user->id == $data->leadid){
                $commagent = $commagent + $data->percentlead;
            }
    
            if($user->id == $data->preleadid){
                $commagent = $commagent + $data->percentprelead;
            }
    
            if($user->id == $data->ipid){
                $commagent = $commagent + $data->percentip;
            }
    
            if($user->id == $data->goponeid){
                $commagent = $commagent + $data->percentgopone;
            }
    
            if($user->id == $data->goptwoid){
                $commagent = $commagent + $data->percentgoptwo;
            }

            $comm = round($commagent, 2);

            if ($d["month"] == '1') {
                $totalJan = $totalJan + $comm;
            } else if ($d["month"] == '2') {
                $totalFeb = $totalFeb + $comm;
            } else if ($d["month"] == '3') {
                $totalMac = $totalMac + $comm;
            } else if ($d["month"] == '4') {
                $totalApril = $totalApril + $comm;
            } else if ($d["month"] == '5') {
                $totalMei = $totalMei + $comm;
            } else if ($d["month"] == '6') {
                $totalJune = $totalJune + $comm;
            } else if ($d["month"] == '7') {
                $totalJuly = $totalJuly + $comm;
            } else if ($d["month"] == '8') {
                $totalAugust = $totalAugust + $comm;
            } else if ($d["month"] == '9') {
                $totalSept = $totalSept + $comm;
            } else if ($d["month"] == '10') {
                $totalOct = $totalOct + $comm;
            } else if ($d["month"] == '11') {
                $totalNov = $totalNov + $comm;
            } else if ($d["month"] == '12') {
                $totalDec = $totalDec + $comm;
            }

        
            

        }

        $monthArray['1'] = $totalJan;
		$monthArray['2'] = $totalFeb;
		$monthArray['3'] = $totalMac;
		$monthArray['4'] = $totalApril;
		$monthArray['5'] = $totalMei;
		$monthArray['6'] = $totalJune;
		$monthArray['7'] = $totalJuly;
		$monthArray['8'] = $totalAugust;
		$monthArray['9'] = $totalSept;
		$monthArray['10'] = $totalOct;
		$monthArray['11'] = $totalNov;
		$monthArray['12'] = $totalDec;

		return response()->json($monthArray);

    }

    public function chartrental(){
        $user = $this->getInfo();
        $monthArray = [];
        $year = date("Y");

        $totalJan = 0;
        $totalFeb = 0;
        $totalMac = 0;
        $totalApril = 0;
        $totalMei = 0;
        $totalJune = 0;
        $totalJuly = 0;
        $totalAugust = 0;
        $totalSept = 0;
        $totalOct = 0;
        $totalNov = 0;
        $totalDec = 0;

        $tempChart = DB::table('rentals')
                ->join('users','users.id','=', 'rentals.agent')
                ->select('rentals.*','users.nickname as nickname')
                ->whereYear('rentals.date','=',$year)
                ->where('rentals.status','=', 'success')
                ->where(function ($query) use($user){
                        $query->where('rentals.agent',$user->id)
                              ->orWhere('rentals.leadid', $user->id)
                              ->orWhere('rentals.preleadid', $user->id)
                              ->orWhere('rentals.ipid', $user->id)
                              ->orWhere('rentals.goponeid', $user->id)
                              ->orWhere('rentals.goptwoid', $user->id);
                        })
                ->get();
            
        foreach($tempChart as $data){

            $tempdate = $data->date;
            $d = date_parse_from_format("Y-m-d", $tempdate);

            $commagent = 0;
            $comm = 0;

            if($user->id == $data->agent){
                $commagent = $commagent + $data->percentagent;
            }
    
            if($user->id == $data->leadid){
                $commagent = $commagent + $data->percentlead;
            }
    
            if($user->id == $data->preleadid){
                $commagent = $commagent + $data->percentprelead;
            }
    
            if($user->id == $data->ipid){
                $commagent = $commagent + $data->percentip;
            }
    
            if($user->id == $data->goponeid){
                $commagent = $commagent + $data->percentgopone;
            }
    
            if($user->id == $data->goptwoid){
                $commagent = $commagent + $data->percentgoptwo;
            }

            $comm = round($commagent, 2);

            if ($d["month"] == '1') {
                $totalJan = $totalJan + $comm;
            } else if ($d["month"] == '2') {
                $totalFeb = $totalFeb + $comm;
            } else if ($d["month"] == '3') {
                $totalMac = $totalMac + $comm;
            } else if ($d["month"] == '4') {
                $totalApril = $totalApril + $comm;
            } else if ($d["month"] == '5') {
                $totalMei = $totalMei + $comm;
            } else if ($d["month"] == '6') {
                $totalJune = $totalJune + $comm;
            } else if ($d["month"] == '7') {
                $totalJuly = $totalJuly + $comm;
            } else if ($d["month"] == '8') {
                $totalAugust = $totalAugust + $comm;
            } else if ($d["month"] == '9') {
                $totalSept = $totalSept + $comm;
            } else if ($d["month"] == '10') {
                $totalOct = $totalOct + $comm;
            } else if ($d["month"] == '11') {
                $totalNov = $totalNov + $comm;
            } else if ($d["month"] == '12') {
                $totalDec = $totalDec + $comm;
            }

        
            

        }

        $monthArray['1'] = $totalJan;
		$monthArray['2'] = $totalFeb;
		$monthArray['3'] = $totalMac;
		$monthArray['4'] = $totalApril;
		$monthArray['5'] = $totalMei;
		$monthArray['6'] = $totalJune;
		$monthArray['7'] = $totalJuly;
		$monthArray['8'] = $totalAugust;
		$monthArray['9'] = $totalSept;
		$monthArray['10'] = $totalOct;
		$monthArray['11'] = $totalNov;
		$monthArray['12'] = $totalDec;

		return response()->json($monthArray);

    }

    public function profile(){
        $user = $this->getinfo();

        if($user == null){
            return redirect('/');
        } else {

            $ipid = null;
            $ipname = null;
            $goponeid = null;
            $goponename = null;
            $goptwoid = null;
            $goptwoname = null;
            $preleadid = null;
            $preleadname = null;
            $leadid = null;
            $leadname = null;
            

            $userdetails = $this->getagentdetails($user->id);

                $ipdetails = $this->getagentdetails($userdetails->ip);
                if($ipdetails){
                    $ipid = $ipdetails->id;
                    $ipname = $ipdetails->nickname;
                }
                $goponedetails = $this->getagentdetails($userdetails->gopone);
                if($goponedetails){
                    $goponeid = $goponedetails->id;
                    $goponename = $goponedetails->nickname;
                }
                $goptwodetails = $this->getagentdetails($userdetails->goptwo);
                if($goptwodetails){
                    $goptwoid = $goptwodetails->id;
                    $goptwoname = $goptwodetails->nickname;
                }
                $preleaddetails = $this->getagentdetails($userdetails->prelead);
                if($preleaddetails){
                    $preleadid = $preleaddetails->id;
                    $preleadname = $preleaddetails->nickname;
                }
                $leaddetails = $this->getagentdetails($userdetails->lead);
                if($leaddetails){
                    $leadid = $leaddetails->id;
                    $leadname = $leaddetails->nickname;
                }

                $leaduser = User::where('level','lead')->get();

                $userarray = [

                    'id' => $userdetails->id,
                    'fullname' => $userdetails->name,
                    'nickname' => $userdetails->nickname,
                    'ic' => $userdetails->ic,
                    'contact' => $userdetails->contact,
                    'email' => $userdetails->email,
                    'bankname' => $userdetails->bankname,
                    'bankaccnumber' => $userdetails->bankaccnumber,
                    'position' => $userdetails->level,
                    'leadid' => $leadid,
                    'leadname' => $leadname,
                    'preleadid' => $preleadid,
                    'preleadname' => $preleadname,
                    'ipid' => $ipid,
                    'ipname' => $ipname,
                    'goponeid' => $goponeid,
                    'goponename' => $goponename,
                    'goptwoid' => $goptwoid,
                    'goptwoname' => $goptwoname,
                    'username' => $userdetails->username,
                    'password' => $userdetails->password,

                ];
                
                return view('/agent/profile', compact('userarray','leaduser'));

        }
    }

    public function editagent($id){

        $user = $this->getinfo();

        $ipid = null;
        $ipname = null;
        $goponeid = null;
        $goponename = null;
        $goptwoid = null;
        $goptwoname = null;
        $preleadid = null;
        $preleadname = null;
        $leadid = null;
        $leadname = null;
            

        $userdetails = $this->getagentdetails($user->id);

        $ipdetails = $this->getagentdetails($userdetails->ip);
        if($ipdetails){
            $ipid = $ipdetails->id;
            $ipname = $ipdetails->nickname;
        }
        $goponedetails = $this->getagentdetails($userdetails->gopone);
        if($goponedetails){
             $goponeid = $goponedetails->id;
             $goponename = $goponedetails->nickname;
        }
        $goptwodetails = $this->getagentdetails($userdetails->goptwo);
        if($goptwodetails){
              $goptwoid = $goptwodetails->id;
              $goptwoname = $goptwodetails->nickname;
        }
        $preleaddetails = $this->getagentdetails($userdetails->prelead);
        if($preleaddetails){
              $preleadid = $preleaddetails->id;
              $preleadname = $preleaddetails->nickname;
        }
        $leaddetails = $this->getagentdetails($userdetails->lead);
        if($leaddetails){
               $leadid = $leaddetails->id;
               $leadname = $leaddetails->nickname;
        }

        $leaduser = User::where('level','lead')->get();

            $userarray = [

                'id' => $userdetails->id,
                'fullname' => $userdetails->name,
                'nickname' => $userdetails->nickname,
                'ic' => $userdetails->ic,
                'contact' => $userdetails->contact,
                'email' => $userdetails->email,
                'bankname' => $userdetails->bankname,
                'bankaccnumber' => $userdetails->bankaccnumber,
                'position' => $userdetails->level,
                'leadid' => $leadid,
                'leadname' => $leadname,
                'preleadid' => $preleadid,
                'preleadname' => $preleadname,
                'ipid' => $ipid,
                'ipname' => $ipname,
                'goponeid' => $goponeid,
                'goponename' => $goponename,
                'goptwoid' => $goptwoid,
                'goptwoname' => $goptwoname,
                'username' => $userdetails->username,
                'password' => $userdetails->password,

            ];
                
        return view('/agent/editprofile', compact('userarray','leaduser'));

    }

    public function updateagent(Request $request, $id){
        
        $fullname = $request->input('fullname');
        $nickname = $request->input('nickname');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $bankname = $request->input('bankname');
        $bankaccnumber = $request->input('bankaccnumber');
        $username = $request->input('username');
        $password = $request->input('password');

        $userdetails = $this->getagentdetails($id);
        
        //nickname
        if($userdetails->nickname != $nickname){
          
           $result = User::where('nickname',$nickname)->where('id','!=',$id)->first();
           if($result == null){
            
               $finalnickname = $nickname;
            //    \Session::flash('flash_message', 'successfully updated');
              
           } else {
              
               $finalnickname = $userdetails->nickname;
            //    \Session::flash('flash_message_delete', 'Error update Password / Nickname / Username is exist');
           }
         

        } else {
            $finalnickname = $nickname;
        }

        //password
        // if($userdetails->password != $password){

        //     $resultpassword = User::where('password',$password)->where('id','!=',$id)->first();
        //     if($resultpassword == null){
        //         $finalpassword = $password;
        //         \Session::flash('flash_message', 'successfully updated');
        //     } else {
        //         $finalpassword = $userdetails->password;
        //         \Session::flash('flash_message_delete', 'Error update Password / Nickname / Username is exist');
        //     }

        // } else {
        //     $finalpassword = $password;
        // }

        //username
        if($userdetails->username != $username){

            $resultusername = User::where('username',$username)->where('id','!=',$id)->first();
            if($resultusername == null){
                $finalusername = $username;
                //\Session::flash('flash_message', 'successfully updated');
            } else {
                $finalusername = $userdetails->username;
                //\Session::flash('flash_message_delete', 'Error update Password / Nickname / Username is exist');
            }
        } else {
            $finalusername = $username;
        }
      
        //save user
        $userdetails->name = $fullname;
        $userdetails->nickname = $finalnickname;
        $userdetails->ic = $ic;
        $userdetails->contact = $contact;
        $userdetails->email = $email;
        $userdetails->bankname = $bankname;
        $userdetails->bankaccnumber = $bankaccnumber;
        $userdetails->username = $finalusername;
        $userdetails->password = $password;

        $userdetails->save();

        $request->session()->put('username', $userdetails->username);
        $request->session()->put('password', $userdetails->password);
        $request->session()->put('nickname', $userdetails->nickname);
        
        return Redirect::route('profile');
    }

    public function getyearagentrental(Request $request){

        $year = $request->input('year');

        if($year == null){
            $year = '2020';
        }

        return view('/agent/agentlistmonthyear', compact('year'));

    }
}


        

        

