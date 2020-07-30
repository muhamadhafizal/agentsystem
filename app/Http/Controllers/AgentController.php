<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    //end get

    public function index(){

        $user = $this->getInfo();
        $totalprocess = 0;
        $totalsuccess = 0;

        if($user){
            
            $year = date("Y");

            $tempUser = $this->getlistuser($user);
            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->select('rentals.*','users.nickname as nickname')
                    ->whereYear('rentals.date','=',$year)
                    ->where(function ($query) use($user,$tempUser){
                        $query->where('rentals.agent',$user->id)
                            ->orWhereIn('rentals.agent',$tempUser);
                    })
                    ->orderBy('rentals.date','DESC')
                    ->get();

            //cardcalculation
            $cases = count($rental);


            foreach($rental as $data){
   
                $useragent = User::where('id',$data->agent)->first();
                
                $commagent = 0;
                $contagent = 0;
                $total = 0;

                if($user->id == $data->agent){
                    $commagent = $data->percentagent;
                }
                if($user->id == $useragent->ip){
                    $contagent = $contagent + $data->percentip;
                }
                if($user->id == $useragent->gopone){
                    $contagent = $contagent + $data->percentgopone; 
                }
                if($user->id == $useragent->goptwo){
                    $contagent = $contagent + $data->percentgoptwo;
                }
                if($user->id == $useragent->lead){
                    $contagent = $contagent + $data->percentlead;
                }
                if($user->id == $useragent->prelead){
                    $contagent = $contagent + $data->percentprelead;
                }

                $total = $contagent + $commagent;

                if($data->status == 'success'){
                    $totalsuccess = $totalsuccess + $total;
                } elseif ($data->status == 'process'){
                    $totalprocess = $totalprocess + $total;
                }

            }
            echo $totalprocess;
            echo $totalsuccess;
            echo $cases;

            return view('agent/index', compact('totalprocess','totalsuccess','cases'));
        } else {
            return redirect('/');
        }

    }

    public function listrental(){

        $user = $this->getInfo();

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

            $i = 1;
         
            return view('agent/agentlistrental', compact('rental','i'));
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

            return view('agent/agentmonthinfo', compact('monthname','rental','i','totalprocess','totalsuccess','cases'));

        }

    }
}

