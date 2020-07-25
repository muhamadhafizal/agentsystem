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
            ->join('areas','areas.id','=','rentals.area')
            ->select('rentals.*','users.nickname as nickname','areas.name as name')
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

        if($user){
            return view('agent/index');
        } else {
            return redirect('/');
        }

    }

    public function listrental(){

        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $tempUser = $this->getlistuser($user);
            
            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->select('rentals.*','users.nickname as nickname')
                    ->where('rentals.agent',$user->id)
                    ->orWhereIn('rentals.agent',$tempUser)
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
            $contagent = 0;

            $useragent = User::where('id',$rentaldetails->agent)->first();
            
            $commagent = $rentaldetails->percentagent;
            if($user->id == $useragent->ip){
                $contagent = $contagent + $rentaldetails->percentip;
            }
            if($user->id == $useragent->gopone){
                $contagent = $contagent + $rentaldetails->percentgopone;
            }
            if($user->id == $useragent->goptwo){
                $contagent = $contagent + $rentaldetails->percentgoptwo;
            }
            if($user->id == $useragent->lead){
                $contagent = $contagent + $rentaldetails->percentlead;
            }
            if($user->id == $useragent->prelead){
                $contagent = $contagent + $rentaldetails->percentprelead;
            }   
            if($user->id == $useragent->id){
                $commagent = $commagent + $contagent;
                $contagent = 0;
            } 


            if($commagent == 0){
                $commagent = '-';
            }
            if($contagent == 0){
                $contagent = '-';
            }

            if($rentaldetails->category == '1'){
                $category  = 'Rental';
            } else {
                $category = 'Subsale';
            }

            $month = date("m",strtotime($rentaldetails->date));
            $year = date("Y",strtotime($rentaldetails->date));

            return view('agent/agentdetailsrental', compact('rentaldetails','commagent','contagent','category','type','month','year'));

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

        if($user == null){
            return redirect('/');
        } else {

            $tempUser = $this->getlistuser($user);

            $rental = DB::table('rentals')
                    ->join('users','users.id','=', 'rentals.agent')
                    ->join('areas','areas.id','=', 'rentals.area')
                    ->select('rentals.*','users.nickname as nickname','areas.name as name')
                    ->whereYear('rentals.date','=',$year)
                    ->whereMonth('rentals.date','=',$month)
                    ->where(function ($query) use($user,$tempUser){
                        $query->where('rentals.agent',$user->id)
                            ->orWhereIn('rentals.agent',$tempUser);
                    })
                    ->orderBy('rentals.date','DESC')
                    ->get();

    
            $i = 1;

            $monthname = $this->getmonthname($month);

            return view('agent/agentmonthinfo', compact('monthname','rental','i'));

        }

    }
}

