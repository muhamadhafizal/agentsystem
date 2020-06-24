<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rental;

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
          
            $rental = Rental::where('agent',$user->id)
                        ->orWhereIn('agent',$tempUser)
                        ->orderBy('date','DESC')
                        ->get();
            $i = 1;
         
            return view('agent/agentlistrental', compact('rental','i'));
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

            $monthname = $this->getmonthname($month);

            return view('agent/agentmonthinfo', compact('monthname'));

        }

    }
}
