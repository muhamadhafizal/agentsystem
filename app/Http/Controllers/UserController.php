<?php

namespace App\Http\Controllers;
use App\User;
use Redirect;
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

    public function getagentdetails($id){

        $userdetails = User::find($id);
        return $userdetails;

    }

    public function getleveluser($type){

        if($type == 'all' ){
            $user = User::where('role','agent')->get();
        } else {
            $user = User::where('role','agent')->where('level',$type)->get();
        }

        return $user;

    }

    public function index(){

        $user = $this->getInfo();

        if($user){

            $alluser = User::where('role','agent')->get();
            $i = 1;

            return view('/admin/user/index',compact('alluser', 'i'));
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

    public function store(Request $request){

        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $fullname = $request->input('fullname');
            $nickname = $request->input('nickname');
            $ic = $request->input('ic');
            $contact = $request->input('contact');
            $email = $request->input('email');
            $position = $request->input('position');
            $lead = $request->input('lead');
            $prelead = $request->input('prelead');
            $ip = $request->input('ip');
            $gopone = $request->input('gopone');
            $goptwo = $request->input('goptwo');
            $username = $request->input('username');
            $password = $request->input('password');

            $user = User::where('username',$username)
                        ->orWhere('password',$password)
                        ->orWhere('email',$email)
                        ->orWhere('nickname',$nickname)->first();

            if($user){
                \Session::flash('flash_message_delete', 'Username / Password / Nickname / Email Already Exist');
			    return Redirect::route('addagent');
            } else {
                
                $role = 'agent';

                $user = new User;
                $user->name = $fullname;
                $user->nickname = $nickname;
                $user->ic = $ic;
                $user->contact = $contact;
                $user->email = $email;
                $user->level = $position;
                $user->lead = $lead;
                $user->prelead = $prelead;
                $user->ip = $ip;
                $user->gopone = $gopone;
                $user->goptwo = $goptwo;
                $user->username = $username;
                $user->password = $password;
                $user->role = $role;

                $user->save();

                \Session::flash('flash_message', 'successfully added.');
			    return Redirect::route('allagents');

            }

        }

    }

    public function details($id){
        
        $userarray = array();
        $user = $this->getInfo();

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
        

            $userdetails = $this->getagentdetails($id);
            if($userdetails){

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
                

                $userarray = [

                    'id' => $userdetails->id,
                    'fullname' => $userdetails->name,
                    'nickname' => $userdetails->nickname,
                    'ic' => $userdetails->ic,
                    'contact' => $userdetails->contact,
                    'email' => $userdetails->email,
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
                
                return view('/admin/user/details', compact('userarray'));

            }

        }

    }

    public function edit($id){
        
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
        $userarray = array();

        $userdetails = $this->getagentdetails($id);
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
                

                $userarray = [

                    'id' => $userdetails->id,
                    'fullname' => $userdetails->name,
                    'nickname' => $userdetails->nickname,
                    'ic' => $userdetails->ic,
                    'contact' => $userdetails->contact,
                    'email' => $userdetails->email,
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
                return view('/admin/user/edit', compact('userarray'));
    }

    public function update($id){
        
        $fullname = $request->input('fullname');
        $nickname = $request->input('nickname');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $lead = $request->input('leadid');
        $prelead = $request->input('preleadid');
        $ip = $request->input('ip');
        $gopone = $request->input('goponeid');
        $goptwo = $request->input('goptwoid');
        $username = $request->input('username');
        $password = $request->input('password');

        $existuser = User::where('nickname',$nickname)
                ->orWhere('email',$email)
                ->orWhere('username', $username)
                ->orWhere('password', $password)
                ->first();
        
            if($existuser){
                \Session::flash('flash_message_delete', 'Username / Password / Nickname / Email Already Exist');
			    return Redirect::route('addagent');
            } else {

                $user = $this->getagentdetails($id);

                $user->fullname = $fullname;
                $user->nickname = $nickname;
                $user->ic = $ic;
                $user->contact = $contact;
                $user->email = $email;
                $user->lead = $lead;
                $user->prelead = $prelead;
                $user->ip = $ip;
                $user->gopone = $gopone;
                $user->goptwo = $goptwo;
                $user->username = $username;
                $user->password = $password;

                $user->save();

                \Session::flash('flash_message', 'successfully updated.');
			    return Redirect::route('allagents');


            }
    }
}