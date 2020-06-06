<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $user = $this->getInfo();

        if($user){
            return view('/admin/user/index');
        } else {
            return redirect('/');
        }

    }

    public function addagent(){

        $user = $this->getInfo();

        if($user){
            return view('/admin/user/addagent');
        } else {
            return redirect('/');
        }

    }
}
