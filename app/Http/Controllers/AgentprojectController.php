<?php

namespace App\Http\Controllers;
use App\User;
use App\Project;
use DB;
use Illuminate\Http\Request;

class AgentprojectController extends Controller
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

    public function getagentinfo($user,$details){

        $nameagent = null;
        $tiering = null;

        //nameagent
        if($user->id == $details->agentone){
            $nameagent = $details->agentnameone;
            $agentcomm = $details->agentcommone;
            $gopnameone = $details->goponenameone;
            $gopnametwo = $details->goptwonameone;
            $gopcommone = $details->goponecommone;
            $gopcommtwo = $details->goptwocommone;
            $ipname = $details->ipnameone;
            $ipcomm = $details->ipcommone;
            $leadname = $details->leadnameone;
            $leadcomm = $details->leadcommone;
            $preleadname = $details->preleadnameone;
            $preleadcomm = $details->preleadcommone;
            $total = $details->totalone;
        }
        elseif($user->id == $details->agenttwo){
            $nameagent = $details->agentnametwo;
            $agentcomm = $details->agentcommtwo;
            $gopnameone = $details->goponenametwo;
            $gopnametwo = $details->goptwonametwo;
            $gopcommone = $details->goponecommtwo;
            $gopcommtwo = $details->goptwocommtwo;
            $ipname = $details->ipnametwo;
            $ipcomm = $details->ipcommtwo;
            $leadname = $details->leadnametwo;
            $leadcomm = $details->leadcommtwo;
            $preleadname = $details->preleadnametwo;
            $preleadcomm = $details->preleadcommtwo;
            $total = $details->totaltwo;
           
        }
        elseif($user->id == $details->agenthree){
            $nameagent = $details->agentnamethree;
            $agentcomm = $details->agentcommthree;
            $gopnameone = $details->goponenamethree;
            $gopnametwo = $details->goptwonamethree;
            $gopcommone = $details->goponecommthree;
            $gopcommtwo = $details->goptwocommthree;
            $ipname = $details->ipnamethree;
            $ipcomm = $details->ipcommthree;
            $leadname = $details->leadnamethree;
            $leadcomm = $details->leadcommthree;
            $preleadname = $details->preleadnamethree;
            $preleadcomm = $details->preleadcommthree;
            $total = $details->totalthree;

        }
        elseif($user->id == $details->agentfour){
            $nameagent = $details->agentnamefour;
            $agentcomm = $details->agentcommfour;
            $gopnameone = $details->goponenamefour;
            $gopnametwo = $details->goptwonamefour;
            $gopcommone = $details->goponecommfour;
            $gopcommtwo = $details->goptwocommfour;
            $ipname = $details->ipnamefour;
            $ipcomm = $details->ipcommfour;
            $leadname = $details->leadnamefour;
            $leadcomm = $details->leadcommfour;
            $preleadname = $details->preleadnamefour;
            $preleadcomm = $details->preleadcommfour;
            $total = $details->totalfour;
        }
        
        //tiering
        if($user->level == 'lead'){
            $tiering = '90%';
        }
        elseif($user->level == 'prelead'){
            $tiering = '80%';
        }
        elseif($user->level == 'consultant'){
            $tiering = '70%';
        }

        if($leadname == null){
            $leadname = '-';
            $leadcomm = '-';
        }
        if($preleadname == null){
            $preleadname = '-';
            $preleadcomm = '-';
        }

        $finalarray = [
            'tiering' => $tiering,
            'nameagent' => $nameagent,
            'agentcomm' => $agentcomm,
            'gopnameone' => $gopnameone,
            'gopcommone' => $gopcommone,
            'gopnametwo' => $gopnametwo,
            'gopcommtwo' => $gopcommtwo,
            'ipname' => $ipname,
            'ipcomm' => $ipcomm,
            'leadname' => $leadname,
            'leadcomm' => $leadcomm,
            'preleadname' => $preleadname,
            'preleadcomm' => $preleadcomm,
            'total' => $total,
        ];

        return $finalarray;        

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

        if($user == null){
            return redirect('/');
        } else {

            $cases = 0;
            $processcomm = 0;
            $successcomm = 0;
            
    
            $project = DB::table('projects')
                    ->where(function ($query) use($user){  
                    $query->where('projects.agentone',$user->id)
                    ->orWhere('projects.agenttwo',$user->id)
                    ->orWhere('projects.agentthree',$user->id)
                    ->orWhere('projects.agentfour',$user->id);    
                    })
                    ->orderBy('projects.date','DESC')
                    ->get();
                    
            if($project){
                $cases = count($project);
                foreach($project as $data){
                            
                    //nak kena tahu dia dekat agent yg mana
                    if($data->status == 'success'){
            
                        if($data->agentone == $user->id){
                            $successcomm = $successcomm + $data->agentcommone;
                        }
                        elseif ($data->agenttwo == $user->id){
                            $successcomm = $successcomm + $data->agentcommtwo;
                        }
                        elseif ($data->agentthree == $user->id){
                            $successcomm = $successcomm + $data->agentcommthree;
                        }
                        elseif ($data->agentfour == $user->id){
                            $successcomm = $successcomm + $data->agentcommfour;
                        }
            
                    }   
                    elseif($data->status == 'process'){
                                
                        if($data->agentone == $user->id){
                            $processcomm = $processcomm + $data->agentcommone;
                        }
                        elseif ($data->agenttwo == $user->id){
                            $processcomm = $processcomm + $data->agentcommtwo;
                        }
                        elseif ($data->agentthree == $user->id){
                            $processcomm = $processcomm + $data->agentcommthree;
                        }
                        elseif ($data->agentfour == $user->id){
                            $processcomm = $processcomm + $data->agentcommfour;
                        }
        
                    }
        
                }
        
            }  
         
            return view('agent/project/index', compact('cases','processcomm','successcomm'));
        }
    }

    public function list(){
       
        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $project = DB::table('projects')
                    ->where('projects.agentone',$user->id)
                    ->orWhere('projects.agenttwo',$user->id)
                    ->orWhere('projects.agentthree',$user->id)
                    ->orWhere('projects.agentfour',$user->id)
                    ->orderBy('projects.date','DESC')
                    ->get();
            
            $i = 1;;

            return view('agent/project/listproject', compact('project','i'));

        }

    }

    public function details($id,$type){
       
        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $details = Project::find($id);

            //agentdetails

            $agentdetails = $this->getagentinfo($user,$details);
      
            $temparray = [
                'unit' => $details->unit,
                'comm' => $details->commperperson,
                'sst' => $details->sst,
                'netcomm' => $details->commpersondeductsst,
            ];

            $month = date('m', strtotime($details->date));
            $year = date("Y", strtotime($details->date));
            
            return view('agent/project/detailsmainproject', compact('temparray','agentdetails','type','month','year'));
       
        }
    }

    public function listmonth(){
        
        $user = $this->getInfo();

        if($user){
            return view('agent/project/agentlistmonth');
        } else {
            return redirect('/');
        }
    }

    public function getmonth($month,$year){
       
        $user = $this->getInfo();

        if($user == null){
            return redirect('/');
        } else {

            $cases = 0;
            $processcomm = 0;
            $successcomm = 0;
            
    
            $project = DB::table('projects')
                    ->whereYear('projects.date','=', $year)
                    ->whereMonth('projects.date','=', $month)
                    ->where(function ($query) use($user){  
                    $query->where('projects.agentone',$user->id)
                    ->orWhere('projects.agenttwo',$user->id)
                    ->orWhere('projects.agentthree',$user->id)
                    ->orWhere('projects.agentfour',$user->id);    
                    })
                    ->orderBy('projects.date','DESC')
                    ->get();
            
            if($project){
                $cases = count($project);
                foreach($project as $data){
                    
                    //nak kena tahu dia dekat agent yg mana
                    if($data->status == 'success'){

                        if($data->agentone == $user->id){
                            $successcomm = $successcomm + $data->agentcommone;
                        }
                        elseif ($data->agenttwo == $user->id){
                            $successcomm = $successcomm + $data->agentcommtwo;
                        }
                        elseif ($data->agentthree == $user->id){
                            $successcomm = $successcomm + $data->agentcommthree;
                        }
                        elseif ($data->agentfour == $user->id){
                            $successcomm = $successcomm + $data->agentcommfour;
                        }

                    }   
                    elseif($data->status == 'process'){
                        
                        if($data->agentone == $user->id){
                            $processcomm = $processcomm + $data->agentcommone;
                        }
                        elseif ($data->agenttwo == $user->id){
                            $processcomm = $processcomm + $data->agentcommtwo;
                        }
                        elseif ($data->agentthree == $user->id){
                            $processcomm = $processcomm + $data->agentcommthree;
                        }
                        elseif ($data->agentfour == $user->id){
                            $processcomm = $processcomm + $data->agentcommfour;
                        }

                    }

                }

            }   
        
            $i = 1;;

            $monthname = $this->getmonthname($month);

            return view('agent/project/agentmonthinfo', compact('monthname','project','i','cases','processcomm','successcomm'));

        }

    }

    public function chartproject(){

        $user = $this->getInfo();

        $monthArray = [];
        $year = date("Y");

        $totalJan = 0;
        $totalFeb = 0;
        $totalMac = 0;
        $totalApril = 0;
        $totalMei = 0;
        $totalJune = 0;
        $totalJuly = 0;
        $totalAugust = 0;
        $totalSept = 0;
        $totalOct = 0;
        $totalNov = 0;
        $totalDec = 0;
        
        $project = DB::table('projects')
                    ->where(function ($query) use($user){  
                    $query->where('projects.agentone',$user->id)
                    ->orWhere('projects.agenttwo',$user->id)
                    ->orWhere('projects.agentthree',$user->id)
                    ->orWhere('projects.agentfour',$user->id);    
                    })
                    ->orderBy('projects.date','DESC')
                    ->get();
        
        if($project){
            
            foreach($project as $data){
                $successcomm = 0;
                if($data->status == 'success'){
            
                    if($data->agentone == $user->id){
                        $successcomm = $data->agentcommone;
                    }
                    elseif ($data->agenttwo == $user->id){
                        $successcomm = $data->agentcommtwo;
                    }
                    elseif ($data->agentthree == $user->id){
                        $successcomm = $data->agentcommthree;
                    }
                    elseif ($data->agentfour == $user->id){
                        $successcomm = $data->agentcommfour;
                    }
        
                }
                
                $tempdate = $data->date;
                $d = date_parse_from_format("Y-m-d", $tempdate);   

                if ($d["month"] == '1') {
                    $totalJan = $totalJan + $successcomm;
                } else if ($d["month"] == '2') {
                    $totalFeb = $totalFeb + $successcomm;
                } else if ($d["month"] == '3') {
                    $totalMac = $totalMac + $successcomm;
                } else if ($d["month"] == '4') {
                    $totalApril = $totalApril + $successcomm;
                } else if ($d["month"] == '5') {
                    $totalMei = $totalMei + $successcomm;
                } else if ($d["month"] == '6') {
                    $totalJune = $totalJune + $successcomm;
                } else if ($d["month"] == '7') {
                    $totalJuly = $totalJuly + $successcomm;
                } else if ($d["month"] == '8') {
                    $totalAugust = $totalAugust + $successcomm;
                } else if ($d["month"] == '9') {
                    $totalSept = $totalSept + $successcomm;
                } else if ($d["month"] == '10') {
                    $totalOct = $totalOct + $successcomm;
                } else if ($d["month"] == '11') {
                    $totalNov = $totalNov + $successcomm;
                } else if ($d["month"] == '12') {
                    $totalDec = $totalDec + $successcomm;
                }

            }

        }

        $monthArray['1'] = $totalJan;
		$monthArray['2'] = $totalFeb;
		$monthArray['3'] = $totalMac;
		$monthArray['4'] = $totalApril;
		$monthArray['5'] = $totalMei;
		$monthArray['6'] = $totalJune;
		$monthArray['7'] = $totalJuly;
		$monthArray['8'] = $totalAugust;
		$monthArray['9'] = $totalSept;
		$monthArray['10'] = $totalOct;
		$monthArray['11'] = $totalNov;
		$monthArray['12'] = $totalDec;
        
		return response()->json($monthArray);

    }

    public function getyearagentproject(Request $request){
        $year = $request->input('year');

        if($year == null){
            $year = '2020';
        }

        return view('/agent/project/agentlistmonthyear', compact('year'));
    }

}

