<?php

namespace App\Http\Controllers;
use App\User;
use App\Rental;
use Redirect;
use DB;
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

            $alluser = $this->getleveluser('all');
            $leaduser = $this->getleveluser('lead');
            $preleaduser = $this->getleveluser('prelead');

            return view('/admin/user/addagent', compact('alluser','leaduser','preleaduser'));
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

    public function show($id){
        
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

            $leaduser = User::where('level','lead')->get();

            //calculate comm agent personal
            $personal = Rental::where('status','success')->where('agent',$id)->get();
            $totalcommpersonal = 0;
            foreach($personal as $dataper){

                $totalcommpersonal = $totalcommpersonal + $dataper->percentagent;
                if($dataper->ipid == $id){
                    $totalcommpersonal = $totalcommpersonal + $dataper->percentip;
                }
                if($dataper->goponeid == $id){
                    $totalcommpersonal = $totalcommpersonal + $dataper->percentgopone;
                }
                if($dataper->goptwoid == $id){
                    $totalcommpersonal = $totalcommpersonal + $dataper->percentgoptwo;
                }

            }

            //calculate comm agent group
            $group = Rental::where('status','success')
                            ->where('agent','!=',$id)
                            ->where(function ($query) use($id){
                                $query->where('leadid', $id)
                                      ->orWhere('preleadid', $id)
                                      ->orWhere('ipid', $id)
                                      ->orWhere('goponeid', $id)
                                      ->orWhere('goptwoid', $id);
                            })
                            ->get();
            $totalcommgroup = 0;
            foreach($group as $datagroup){

                if($datagroup->leadid == $id){
                    $totalcommgroup = $totalcommgroup + $datagroup->percentlead;
                }
                if($datagroup->preleadid == $id){
                    $totalcommgroup = $totalcommgroup + $datagroup->percentprelead;
                }
                if($datagroup->ipid == $id){
                    $totalcommgroup = $totalcommgroup + $datagroup->percentip;
                }
                if($datagroup->goponeid == $id){
                    $totalcommgroup = $totalcommgroup + $datagroup->percentgopone;
                }
                if($datagroup->goptwoid == $id){
                    $totalcommgroup = $totalcommgroup + $datagroup->percentgoptwo;
                }


            }
  
            //status
            $status = '-';
            if($userdetails->level == 'consultant'){
                if($totalcommpersonal >= 50000 || $totalcommgroup >= 50000){
                    $status = 'up to PRELEAD level';
                }
            }

            if($userdetails->level == 'prelead'){
                if($totalcommpersonal >= 200000 || $totalcommgroup >= 300000){
                    $status = 'up to LEAD level';
                    
                } 
            
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
                'totalcommgroup' => $totalcommgroup,
                'totalcommpersonal' => $totalcommpersonal,
                'status' => $status,

            ];
                
                return view('/admin/user/details', compact('userarray','leaduser'));

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
        
        $alluser = $this->getleveluser('all');
        $leaduser = $this->getleveluser('lead');
        $preleaduser = $this->getleveluser('prelead');
                

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
                return view('/admin/user/edit', compact('userarray','alluser','leaduser','preleaduser'));
    }

    public function update(Request $request, $id){

        $idtemparray = array();
        
        $fullname = $request->input('fullname');
        $nickname = $request->input('nickname');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $lead = $request->input('lead');
        $prelead = $request->input('prelead');
        $ip = $request->input('ip');
        $username = $request->input('username');
        $password = $request->input('password');
        $position = $request->input('position');

        $user = $this->getagentdetails($id);

        if($user->level != $position){
         
            if($position == 'lead'){
                
                $listteam = User::where('level','consultant')->where('prelead',$id)->get();

                foreach($listteam as $data){
                    array_push($idtemparray,$data->id);
                }
        
                User::whereIn('id',$idtemparray)->update(array('lead' => $id));
                

            }
        }

         //nickname
         if($user->nickname != $nickname){
          
            $result = User::where('nickname',$nickname)->where('id','!=',$id)->first();
            if($result == null){
             
                $finalnickname = $nickname;
                \Session::flash('flash_message', 'successfully updated');
               
            } else {
               
                $finalnickname = $user->nickname;
                \Session::flash('flash_message_delete', 'Error update Password / Nickname is exist');
            }
          
 
         } else {
             $finalnickname = $nickname;
         }
 
         //password
         if($user->password != $password){
 
             $resultpassword = User::where('password',$password)->where('id','!=',$id)->first();
             if($resultpassword == null){
                 $finalpassword = $password;
                 \Session::flash('flash_message', 'successfully updated');
             } else {
                 $finalpassword = $user->password;
                 \Session::flash('flash_message_delete', 'Error update Password / Nickname is exist');
             }
 
         } else {
             $finalpassword = $password;
         }
 
         //username
         if($user->username != $username){
 
             $resultusername = User::where('username',$username)->where('id','!=',$id)->first();
             if($resultusername == null){
                 $finalusername = $username;
                 \Session::flash('flash_message', 'successfully updated');
             } else {
                 $finalusername = $user->username;
                 \Session::flash('flash_message_delete', 'Error update Password / Nickname / Username is exist');
             }
         } else {
             $finalusername = $username;
         }

        $user->name = $fullname;
        $user->nickname = $finalnickname;
        $user->ic = $ic;
        $user->contact = $contact;
        $user->email = $email;
        $user->lead = $lead;
        $user->prelead = $prelead;
        $user->ip = $ip;
        $user->username = $finalusername;
        $user->password = $finalpassword;
        $user->level = $position;

        $user->save();

        return Redirect::route('detailsagent', compact('id'));
            
    }

    public function destroy($id){

        $user = $this->getagentdetails($id);
        $user->delete($user->id);

        \Session::flash('flash_message_delete', 'successfully deleted.');
        return Redirect::route('allagents');

    }

    public function downline($id){

        $iparray = array();
        $goponearray = array();
        $goptwoarray = array();
        $preleadarray = array();
        $leadarray = array();
        $finalarray = array();

        //ip
        $iplist = User::where('ip',$id)->get();
        foreach($iplist as $data){
            array_push($iparray,$data);
        }
        //gop1
        $goponelist = User::where('gopone',$id)->get();
        foreach($goponelist as $data){
            array_push($goponearray,$data);
        }
        //gop2
        $goptwolist = User::where('goptwo',$id)->get();
        foreach($goptwolist as $data){
            array_push($goptwoarray,$data);
        }
        //lead
        $leadlist = User::where('lead',$id)->get();
        foreach($leadlist as $data){
            array_push($leadarray,$data);
        }
        //prelead
        $preleadlist = User::where('prelead',$id)->get();
        foreach($preleadlist as $data){
            array_push($preleadarray, $data);
        }
      
        $i = 1;
        
        return view('/admin/user/downline', compact('id','i','iparray','goponearray','goptwoarray','preleadarray','leadarray'));

    }

    public function updategop(Request $request,$id){
        
        $gopid = $request->input('gopid');
        $idtemparray = array();

        $userdetail = User::find($id);
        $idgoptwo = $userdetail->goptwo;


        //llist of downline
        $user = User::where('lead',$id)->get();
      
        foreach($user as $data){
            array_push($idtemparray,$data->id);
        }
        array_push($idtemparray,$id);

        //update gop1 replace from gop2
        User::whereIn('id', $idtemparray)->update(array('gopone' => $idgoptwo));

        //update gop2 replace from new gop
        User::whereIn('id', $idtemparray)->update(array('goptwo' => $gopid));

        \Session::flash('flas_message', 'successfully update gop');
        return Redirect::route('detailsagent', compact('id'));
       

    }
}
