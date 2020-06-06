<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
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
            return view('admin/index');
        } else {
            return redirect('/');
        }

    }
}
