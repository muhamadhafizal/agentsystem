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

        } else if ($type == 'lead'){

            $user = User::where('role','agent')
                    ->where(function ($query){
                        $query->where('level','lead')
                        ->orWhere('level','fullcomm');
            })
            ->get();

        }
        else {
            $user = User::where('role','agent')->where('level',$type)->get();
        }

        return $user;

    }

    public function index(){

        $user = $this->getInfo();
        $userarray = array();

        if($user){

            $alluser = User::where('role','agent')->where('status','!=','2')->get();
            $i = 1;

            foreach($alluser as $user){

                if($user->status == 0){
                    $status = 'active';
                } else {
                    $status = 'resign';
                }

                $temparray = [
                    'id' => $user->id,
                    'nickname' => $user->nickname,
                    'contact' => $user->contact,
                    'ic' => $user->ic,
                    'bankname' => $user->bankname,
                    'bankaccnumber' => $user->bankaccnumber,
                    'level' => $user->level,
                    'status' => $status,
                ];

                array_push($userarray,$temparray);

            }

            return view('/admin/user/index',compact('alluser', 'i','userarray'));
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
            $bankname = $request->input('bankname');
            $bankaccnumber = $request->input('bankaccnumber');
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
                $user->bankname = $bankname;
                $user->bankaccnumber = $bankaccnumber;
                $user->level = $position;
                $user->lead = $lead;
                $user->prelead = $prelead;
                $user->ip = $ip;
                $user->gopone = $gopone;
                $user->goptwo = $goptwo;
                $user->username = $username;
                $user->password = $password;
                $user->role = $role;
                $user->status = 0;

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

            //$leaduser = User::where('level','lead')->get();
            $leaduser = $this->getleveluser('lead');

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

            //group
            //1st cari dia punya downline (user)
            $downline = User::where('id','!=',$id)
                              ->where(function ($query) use($id){
                                $query->where('goptwo',$id)
                                      ->orWhere('gopone',$id)
                                      ->orWhere('lead',$id)
                                      ->orWhere('prelead',$id);
                            })
                        ->get();
            $arrayid = array();
            foreach($downline as $data){
                array_push($arrayid,$data->id);
            }
           
            //2nd find rentalid based on downline
            $rentaldownline = Rental::where('status','success')
                                    ->where(function ($query) use($arrayid){
                                      $query->whereIn('agent',$arrayid)
                                            ->orWhereIn('leadid',$arrayid)
                                            ->orWhereIn('preleadid', $arrayid)
                                            ->orWhereIn('goponeid', $arrayid)
                                            ->orWhereIn('goptwoid', $arrayid);
                                    })
                                    ->get();
           
            //3rd totalup only agentpercent
            $finaltotalgroup = 0;
            foreach($rentaldownline as $data){
               
                if(in_array($data->agent,$arrayid)){
                    $finaltotalgroup = $finaltotalgroup + $data->percentagent;

                }

                if(in_array($data->leadid,$arrayid)){
                    $finaltotalgroup = $finaltotalgroup + $data->percentlead;
   
                }

                if(in_array($data->preleadid,$arrayid)){
                    $finaltotalgroup = $finaltotalgroup + $data->percentprelead;

                }

                if(in_array($data->goponeid,$arrayid)){
                    $finaltotalgroup = $finaltotalgroup + $data->percentgopone;

                }

                if(in_array($data->goptwoid,$arrayid)){
                    $finaltotalgroup = $finaltotalgroup + $data->percentgoptwo;
                }
              
            }


            $finaltotalpersonal = $totalcommpersonal + $totalcommgroup;
            
  
            //status
            $status = '-';
            if($userdetails->level == 'consultant'){
                if($finaltotalpersonal >= 50000){
                    $status = 'up to PRELEAD level';
                }
            }

            if($userdetails->level == 'prelead'){
                if($finaltotalpersonal >= 200000 || $finaltotalgroup >= 300000){
                    $status = 'up to LEAD level';
                    
                } 
            
            }

            if($userdetails->status == 0){
                $defstatus = 'active';
            } else {
                $defstatus = 'resign';
            }
                
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
                'totalcommgroup' => $finaltotalgroup,
                'totalcommpersonal' => $finaltotalpersonal,
                'status' => $status,
                'defstatus' => $defstatus,

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

        if($userdetails->status == 0){
            $defstatus = 'active';
        } else {
            $defstatus = 'resign';
        }
                

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
                    'status' => $userdetails->status,
                    'defstatus' => $defstatus,

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
        $bankname = $request->input('bankname');
        $bankaccnumber = $request->input('bankaccnumber');
        $lead = $request->input('lead');
        $prelead = $request->input('prelead');
        $ip = $request->input('ip');
        $username = $request->input('username');
        $password = $request->input('password');
        $position = $request->input('position');
        $status = $request->input('status');

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
        $user->bankname = $bankname;
        $user->bankaccnumber = $bankaccnumber;
        $user->lead = $lead;
        $user->prelead = $prelead;
        $user->ip = $ip;
        $user->username = $finalusername;
        $user->password = $finalpassword;
        $user->level = $position;
        $user->status = $status;
        $user->save();

        return Redirect::route('detailsagent', compact('id'));
            
    }

    public function destroy($id){

        $user = $this->getagentdetails($id);
        $user->status = '2';
        $user->save();

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
