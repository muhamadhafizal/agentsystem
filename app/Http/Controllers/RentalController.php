<?php

namespace App\Http\Controllers;
use App\User;
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

    public function index(){

        $user = $this->getInfo();

        if($user){
            return view('/admin/rental');
        } else {
            return redirect('/');
        }

    }

    public function addrental(){

        $user = $this->getInfo();

        if($user){
            return view('/admin/addrental');
        } else {
            return redirect('/');
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

        if($user){
            
            $monthname = $this->getmonthname($month);

            return view('/admin/monthinfo', compact('monthname'));
           

        } else {
            return redirect('/');
        }

    }
}
