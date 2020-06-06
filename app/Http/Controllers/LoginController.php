<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Session;
use Redirect;

class LoginController extends Controller
{
    public function store(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username',$username)->where('password',$password)->first();

        if($user){

            $request->session()->put('username', $username);
			$request->session()->put('password', $password);
            $request->session()->put('role', $user->role);
            
            if($user->role == 'admin' || $user->role == 'account'){
                return Redirect::route('admindashboard');
            } else {
                return Redirect::route('agentdashboard');
            }
            
        } else {
            return \Redirect::to('/')->with('status', 'Invalid Username Or Password');
        }

    }

    public function logout(Request $request) {
		Session::flush();
		return redirect('/');
	}
}



