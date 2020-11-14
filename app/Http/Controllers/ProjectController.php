<?php

namespace App\Http\Controllers;
use App\User;
use App\Projectvoucher;
use App\Project;
use Redirect;
use DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class ProjectController extends Controller
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
    
    public function getUser(){
        $user = User::where('role','agent')->get();

        return $user;
    }

    public function gettiering($agentid,$comm){

        $agentcomm = 0;
        $ipcomm = 0;
        $leadcomm = 0;
        $preleadcomm = 0;
        $goponecomm = 0;
        $goptwocomm = 0;
        $leadname = null;
        $preleadname = null;
        $ipname = null;
        $goponename = null;
        $goptwoname = null;

       
        $userdetails = User::find($agentid);
        //level
        $leveluser = $userdetails->level;
        if($leveluser == 'lead'){
            $agentcomm = number_format($comm * (0.9),2,'.','');

        } elseif($leveluser == 'prelead'){
            $agentcomm = number_format($comm *(0.8),2,'.','');
            $leadcomm = number_format($agentcomm * (0.1),2,'.','');

            //leaddetails
            $leaddetails = User::find($userdetails->lead);
            $leadname = $leaddetails->nickname;
         
        } elseif($leveluser == 'consultant'){
            $agentcomm = number_format($comm *(0.7),2,'.','');
            $leadcomm = number_format($agentcomm * (0.1),2,'.','');
            $preleadcomm = number_format($agentcomm * (0.1),2,'.','');

             //leaddetails
             $leaddetails = User::find($userdetails->lead);
             $leadname = $leaddetails->nickname;

             //preleaddetails
             $preleaddetails = User::find($userdetails->prelead);
             $preleadname = $leaddetails->nickname;

             
           
        }
        //gopone
        $goponecomm = number_format($agentcomm *(0.02),2,'.','');
        $goponedetails = User::find($userdetails->gopone);
        if($goponedetails){
            $goponename = $goponedetails->nickname;
        }
        
        //goptwo
        $goptwocomm = number_format($agentcomm *(0.02),2,'.','');
        $goptwodetails = User::find($userdetails->goptwo);
        if($goptwodetails){
            $goptwoname = $goptwodetails->nickname;
        }

        //ip
        $ipuser = User::find($userdetails->ip);
        if($ipuser){
            //lead 3%
            if($ipuser->level == 'lead'){
                $ippercent = 0.03;
            } else {
                $ippercent = 0.05;
            }
            $ipcomm = number_format($agentcomm *($ippercent),2,'.','');
            $ipname = $ipuser->nickname;
           
        } 
        $total = $agentcomm + $ipcomm + $goponecomm + $goptwocomm + $leadcomm + $preleadcomm;

        $finalarray = [
            
            'agentname' => $userdetails->nickname,
            'agentid' => $agentid,
            'leadid' => $userdetails->lead,
            'leadname' => $leadname,
            'preleadid' => $userdetails->prelead,
            'preleadname' => $preleadname,
            'ipid' => $userdetails->ip,
            'ipname' => $ipname,
            'goponeid' => $userdetails->gopone,
            'goponename' => $goponename,
            'goptwoid' => $userdetails->goptwo,
            'goptwoname' => $goptwoname,
            'agentcomm' => $agentcomm,
            'ipcomm' => $ipcomm,
            'leadcomm' => $leadcomm,
            'preleadcomm' => $preleadcomm,
            'goponecomm' => $goponecomm,
            'goptwocomm' => $goptwocomm,
            'total' => $total,

        ];
  
        $result = json_encode($finalarray);
        return $finalarray;
        
    }

    public function finduser($id){

        $user = User::find($id);
        return $user;

    }

    public function getgeneral($netselling,$percentcomm,$agentone,$agenttwo,$agentthree,$agentfour,$percentpoolfund,$leaderone,$leadertwo,$leaderthree,$leaderfour,$percentleader,$percentcompany,$percentpartner){

        //netcomm
        $tempnetcomm = $netselling * ($percentcomm/100);
        $netcomm = number_format($tempnetcomm,2, '.','');

        //commperperson
        $agentcount = 0;
        if($agentone != null){
            $agentcount = $agentcount + 1;
        }
        if($agenttwo != null){
            $agentcount = $agentcount + 1;
        }
        if($agentthree != null){
            $agentcount = $agentcount + 1;
        }
        if($agentfour != null){
            $agentcount = $agentcount + 1;
        }
        $commperperson = $netcomm/$agentcount;
 
        //poolfundcomm
        $temppoolfundcomm = $netselling * ($percentpoolfund/100);
        $poolfundcomm = number_format($temppoolfundcomm,2,'.','');

        //leadercomm
        $leadercount = 0;
        if($leaderone != null){
            $leadercount = $leadercount + 1;
        }
        if($leadertwo != null){
            $leadercount = $leadercount + 1;
        }
        if($leaderthree != null){
            $leaderthree = $leadercount + 1;
        }
        if($leaderfour != null){
            $leaderfour = $leadercount + 1;
        }
        
        $templeadercomm = $netselling * ($percentleader/100);
        $leadercomm = number_format($templeadercomm/$leadercount,2,'.','');

        //companycomm
        $finalpercencompany = $percentcompany - 0.3;
        $tempcompanycomm = $netselling * ($finalpercencompany/100);
        $companycomm = number_format($tempcompanycomm,2,'.','');
        
        if($percentpartner){
            //theroofcomm
            $temptheroof = $netselling * ($percentpartner/100);
            $theroofcomm = number_format($temptheroof,2,'.','');
        } else {
            $theroofcomm = 0;
        }
        

        $temparray = [
            'netcomm' => $netcomm,
            'commperperson' => $commperperson,
            'poolfundcomm' => $poolfundcomm,
            'leadercomm' => $leadercomm,
            'companycomm' => $companycomm,
            'theroofcomm' => $theroofcomm,
        ];

        return $temparray;
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
        $totalcases = 0;
        $totalnetselling = 0;
        $totalnetcomm = 0;
        $totalpoolfundcomm = 0;
        $totalcompanycomm = 0;
        $totaldiff = 0;

        if($user){

            //kita start calculation dekat sini
             //calculation
             $currentYear = date("Y");
             $calprojects = Project::whereYear('date',$currentYear)
             ->where('status','success')
             ->get();

            if($calprojects){

                $totalcases = count($calprojects);

                foreach($calprojects as $data){

                $totalnetselling = $totalnetselling + $data->netselling;
                $totalpoolfundcomm = $totalpoolfundcomm + $data->poolfundcomm;
                $totalnetcomm = $totalnetcomm + $data->netcomm;
                $totalcompanycomm = $totalcompanycomm + $data->companycomm;
                $totaldiff = $totaldiff + $data->tieringdiff;

                }

            }  

            return view('admin/project/index', compact('totalcases','totalnetselling','totalpoolfundcomm','totalnetcomm','totalcompanycomm','totaldiff'));
        } else {
            return redirect('/');
        }

    }

    public function addproject(){

        $user = $this->getInfo();
        $alluser = $this->getUser();

        if($user){
            return view('admin/project/addproject', compact('alluser'));
        } else {
            return redirect('/');
        }
        
    }

    public function store(Request $request){
        
        //start
            $agentnameone = null;
            $agentidone = null;
            $agentcommone = null;
            $ipidone = null;
            $ipnameone = null;
            $ipcommone = null;
            $goponeidone = null;
            $goponenameone = null;
            $goponecommone = null;
            $goptwoidone = null;
            $goptwonameone = null;
            $goptwocommone = null;
            $leadidone = null;
            $leadnameone = null;
            $leadcommone = null;
            $preleadidone = null;
            $preleadnameone = null;
            $preleadcommone = null;
            $totalcommone = 0;

            $agentnametwo = null;
            $agentidtwo = null;
            $agentcommtwo = null;
            $ipidtwo = null;
            $ipnametwo = null;
            $ipcommtwo = null;
            $goponeidtwo = null;
            $goponenametwo = null;
            $goponecommtwo = null;
            $goptwoidtwo = null;
            $goptwonametwo = null;
            $goptwocommtwo = null;
            $leadidtwo = null;
            $leadnametwo = null;
            $leadcommtwo = null;
            $preleadidtwo = null;
            $preleadnametwo = null;
            $preleadcommtwo = null;
            $totalcommtwo = 0;

            $agentnamethree = null;
            $agentidthree = null;
            $agentcommthree = null;
            $ipidthree = null;
            $ipnamethree = null;
            $ipcommthree = null;
            $goponeidthree = null;
            $goponenamethree = null;
            $goponecommthree = null;
            $goptwoidthree = null;
            $goptwonamethree = null;
            $goptwocommthree = null;
            $leadidthree = null;
            $leadnamethree = null;
            $leadcommthree = null;
            $preleadidthree = null;
            $preleadnamethree = null;
            $preleadcommthree = null;
            $totalcommthree = 0;

            $agentnamefour = null;
            $agentidfour = null;
            $agentcommfour = null;
            $ipidfour = null;
            $ipnamefour = null;
            $ipcommfour = null;
            $goponeidfour = null;
            $goponenamefour = null;
            $goponecommfour = null;
            $goptwoidfour = null;
            $goptwonamefour = null;
            $goptwocommfour = null;
            $leadidfour = null;
            $leadnamefour = null;
            $leadcommfour = null;
            $preleadidfour = null;
            $preleadnamefour = null;
            $preleadcommfour = null;
            $totalcommfour = 0;

        //end

        $date = $request->input('date');
        $unit = $request->input('unit');
        $purchaser = $request->input('purchaser');
        $purchasertwo = $request->input('purchasertwo');
        $agentone = $request->input('agentone');
        $agenttwo = $request->input('agenttwo');
        $agentthree = $request->input('agentthree');
        $agentfour = $request->input('agentfour');
        $spaprice = $request->input('spa');
        $netselling = $request->input('netselling');
        $percentcomm = $request->input('percentcomm');
        $percentpoolfund = $request->input('percentpoolfund');
        $percentleader = $request->input('percentleader');
        $percentcompany = $request->input('percentcompany');
        $percentpartner = $request->input('percentpartner');
        $leaderone = $request->input('leaderone');
        $leadertwo = $request->input('leadertwo');
        $leaderthree = $request->input('leaderthree');
        $leaderfour = $request->input('leaderfour');

        //netcomm
        $tempnetcomm = $netselling * ($percentcomm/100);
        $netcomm = number_format($tempnetcomm,2, '.','');

        //commperperson
        $agentcount = 0;
        if($agentone != null){
            $agentcount = $agentcount + 1;
        }
        if($agenttwo != null){
            $agentcount = $agentcount + 1;
        }
        if($agentthree != null){
            $agentcount = $agentcount + 1;
        }
        if($agentfour != null){
            $agentcount = $agentcount + 1;
        }
        $commperperson = $netcomm/$agentcount;
 
        //poolfundcomm
        $temppoolfundcomm = $netselling * ($percentpoolfund/100);
        $poolfundcomm = number_format($temppoolfundcomm,2,'.','');

        //leadercomm
        $leadercount = 0;
        if($leaderone != null){
            $leadercount = $leadercount + 1;
        }
        if($leadertwo != null){
            $leadercount = $leadercount + 1;
        }
        if($leaderthree != null){
            $leaderthree = $leadercount + 1;
        }
        if($leaderfour != null){
            $leaderfour = $leadercount + 1;
        }
        
        $templeadercomm = $netselling * ($percentleader/100);
        $leadercomm = number_format($templeadercomm/$leadercount,2,'.','');

        //companycomm
        $finalpercencompany = $percentcompany - 0.3;
        $tempcompanycomm = $netselling * ($finalpercencompany/100);
        $companycomm = number_format($tempcompanycomm,2,'.','');
        
        //theroofcomm / partner percent
        if($percentpartner){
            $temptheroof = $netselling * ($percentpartner/100);
            $theroofcomm = number_format($temptheroof,2,'.','');
        } else {
            $theroofcomm = 0;
        }
        

        //status
        $status = 'process';

        //tiering process
        $percentsst = $commperperson * (0.06);
        $commpersondeductsst = number_format($commperperson - $percentsst,2,'.','');
     
        if($agentone != null){
            $agentcalculation = $this->gettiering($agentone,$commpersondeductsst);
            $agentnameone = $agentcalculation['agentname'];
            $agentidone = $agentcalculation['agentid'];
            $agentcommone = $agentcalculation['agentcomm'];
            $ipidone = $agentcalculation['ipid'];
            $ipnameone = $agentcalculation['ipname'];
            $ipcommone = $agentcalculation['ipcomm'];
            $goponeidone = $agentcalculation['goponeid'];
            $goponenameone = $agentcalculation['goponename'];
            $goponecommone = $agentcalculation['goponecomm'];
            $goptwoidone = $agentcalculation['goptwoid'];
            $goptwonameone = $agentcalculation['goptwoname'];
            $goptwocommone = $agentcalculation['goptwocomm'];
            $leadidone = $agentcalculation['leadid'];
            $leadnameone = $agentcalculation['leadname'];
            $leadcommone = $agentcalculation['leadcomm'];
            $preleadidone = $agentcalculation['preleadid'];
            $preleadnameone = $agentcalculation['preleadname'];
            $preleadcommone = $agentcalculation['preleadcomm']; 
            $totalcommone = $agentcalculation['total'];
            
        } 
        if($agenttwo != null){
            $agentcalculation = $this->gettiering($agenttwo,$commpersondeductsst);
            $agentnametwo = $agentcalculation['agentname'];
            $agentidtwo = $agentcalculation['agentid'];
            $agentcommtwo = $agentcalculation['agentcomm'];
            $ipidtwo = $agentcalculation['ipid'];
            $ipnametwo = $agentcalculation['ipname'];
            $ipcommtwo = $agentcalculation['ipcomm'];
            $goponeidtwo = $agentcalculation['goponeid'];
            $goponenametwo = $agentcalculation['goponename'];
            $goponecommtwo = $agentcalculation['goponecomm'];
            $goptwoidtwo = $agentcalculation['goptwoid'];
            $goptwonametwo = $agentcalculation['goptwoname'];
            $goptwocommtwo = $agentcalculation['goptwocomm'];
            $leadidtwo = $agentcalculation['leadid'];
            $leadnametwo = $agentcalculation['leadname'];
            $leadcommtwo = $agentcalculation['leadcomm'];
            $preleadidtwo = $agentcalculation['preleadid'];
            $preleadnametwo = $agentcalculation['preleadname'];
            $preleadcommtwo = $agentcalculation['preleadcomm']; 
            $totalcommtwo = $agentcalculation['total'];
           
        }
        if($agentthree != null){
            $agentcalculation = $this->gettiering($agentthree,$commpersondeductsst);
            $agentnamethree = $agentcalculation['agentname'];
            $agentidthree = $agentcalculation['agentid'];
            $agentcommthree = $agentcalculation['agentcomm'];
            $ipidthree = $agentcalculation['ipid'];
            $ipnamethree = $agentcalculation['ipname'];
            $ipcommthree = $agentcalculation['ipcomm'];
            $goponeidthree = $agentcalculation['goponeid'];
            $goponenamethree = $agentcalculation['goponename'];
            $goponecommthree = $agentcalculation['goponecomm'];
            $goptwoidthree = $agentcalculation['goptwoid'];
            $goptwonamethree = $agentcalculation['goptwoname'];
            $goptwocommthree = $agentcalculation['goptwocomm'];
            $leadidthree = $agentcalculation['leadid'];
            $leadnamethree = $agentcalculation['leadname'];
            $leadcommthree = $agentcalculation['leadcomm'];
            $preleadidthree = $agentcalculation['preleadid'];
            $preleadnamethree = $agentcalculation['preleadname'];
            $preleadcommthree = $agentcalculation['preleadcomm']; 
            $totalcommthree = $agentcalculation['total'];
        }
        if($agentfour != null){
            $agentcalculation = $this->gettiering($agentfour,$commpersondeductsst);
            $agentnamefour = $agentcalculation['agentname'];
            $agentidfour = $agentcalculation['agentid'];
            $agentcommfour = $agentcalculation['agentcomm'];
            $ipidfour = $agentcalculation['ipid'];
            $ipnamefour = $agentcalculation['ipname'];
            $ipcommfour = $agentcalculation['ipcomm'];
            $goponeidfour = $agentcalculation['goponeid'];
            $goponenamefour = $agentcalculation['goponename'];
            $goponecommfour = $agentcalculation['goponecomm'];
            $goptwoidfour = $agentcalculation['goptwoid'];
            $goptwonamefour = $agentcalculation['goptwofour'];
            $goptwocommfour = $agentcalculation['goptwocomm'];
            $leadidfour = $agentcalculation['leadid'];
            $leadnamefour = $agentcalculation['leadname'];
            $leadcommfour = $agentcalculation['leadcomm'];
            $preleadidfour = $agentcalculation['preleadid'];
            $preleadnamefour = $agentcalculation['preleadname'];
            $preleadcommfour = $agentcalculation['preleadcomm']; 
            $totalcommfour = $agentcalculation['total'];
        }

        $totalpayout = $totalcommone + $totalcommtwo + $totalcommthree + $totalcommfour;
        $tieringdiff = $netcomm - $totalpayout;

        //next how nak store dekat database (impoertant)
        $project = new Project;
        $project->date = $date;
        $project->unit = $unit;
        $project->purchaser = $purchaser;
        $project->purchasertwo = $purchasertwo;
        $project->agentone = $agentone;
        $project->agenttwo = $agenttwo;
        $project->agentthree = $agentthree;
        $project->agentfour = $agentfour;
        $project->spaprice = $spaprice;
        $project->netselling = $netselling;
        $project->percentcomm = $percentcomm;
        $project->netcomm = $netcomm;
        $project->commperperson = $commperperson;
        $project->percentpoolfund = $percentpoolfund;
        $project->percentleader = $percentleader;
        $project->poolfundcomm = $poolfundcomm;
        $project->leaderone = $leaderone;
        $project->leadertwo = $leadertwo;
        $project->leaderthree = $leaderthree;
        $project->leaderfour = $leaderfour;
        $project->leadercomm = $leadercomm;
        $project->percentcompany = $percentcompany;
        $project->companycomm = $companycomm;
        $project->percentpartner = $percentpartner;
        $project->theroofcomm = $theroofcomm;
        $project->tieringdiff = $tieringdiff;
        $project->status = $status;
        $project->sst = $percentsst;
        $project->commpersondeductsst = $commpersondeductsst;
        $project->totalpayout = $totalpayout;

        $project->agentnameone = $agentnameone;
        $project->agentidone = $agentidone;
        $project->agentcommone = $agentcommone;
        $project->ipidone = $ipidone;
        $project->ipnameone = $ipnameone;
        $project->ipcommone = $ipcommone;
        $project->goponeidone = $goponeidone;
        $project->goponenameone = $goponenameone;
        $project->goponecommone = $goponecommone;
        $project->goptwoidone = $goptwoidone;
        $project->goptwonameone = $goptwonameone;
        $project->goptwocommone = $goptwocommone;
        $project->leadidone = $leadidone;
        $project->leadnameone = $leadnameone;
        $project->leadcommone = $leadcommone;
        $project->preleadidone = $preleadidone;
        $project->preleadnameone = $preleadnameone;
        $project->preleadcommone = $preleadcommone;
        $project->totalone = $totalcommone;

        $project->agentnametwo = $agentnametwo;
        $project->agentidtwo = $agentidtwo;
        $project->agentcommtwo = $agentcommtwo;
        $project->ipidtwo = $ipidtwo;
        $project->ipnametwo = $ipnametwo;
        $project->ipcommtwo = $ipcommtwo;
        $project->goponeidtwo = $goponeidtwo;
        $project->goponenametwo = $goponenametwo;
        $project->goponecommtwo = $goponecommtwo;
        $project->goptwoidtwo = $goptwoidtwo;
        $project->goptwonametwo = $goptwonametwo;
        $project->goptwocommtwo = $goptwocommtwo;
        $project->leadidtwo = $leadidtwo;
        $project->leadnametwo = $leadnametwo;
        $project->leadcommtwo = $leadcommtwo;
        $project->preleadidtwo = $preleadidtwo;
        $project->preleadnametwo = $preleadnametwo;
        $project->preleadcommtwo = $preleadcommtwo;
        $project->totaltwo = $totalcommtwo;

        $project->agentnamethree = $agentnamethree;
        $project->agentidthree = $agentidthree;
        $project->agentcommthree = $agentcommthree;
        $project->ipidthree = $ipidthree;
        $project->ipnamethree = $ipnamethree;
        $project->ipcommthree = $ipcommthree;
        $project->goponeidthree = $goponeidthree;
        $project->goponenamethree = $goponenamethree;
        $project->goponecommthree = $goponecommthree;
        $project->goptwoidthree = $goptwoidthree;
        $project->goptwonamethree = $goptwonamethree;
        $project->goptwocommthree = $goptwocommthree;
        $project->leadidthree = $leadidthree;
        $project->leadnamethree = $leadnamethree;
        $project->leadcommthree = $leadcommthree;
        $project->preleadidthree = $preleadidthree;
        $project->preleadnamethree = $preleadnamethree;
        $project->preleadcommthree = $preleadcommthree;
        $project->totalthree = $totalcommthree;

        $project->agentnamefour = $agentnamefour;
        $project->agentidfour = $agentidfour;
        $project->agentcommfour = $agentcommfour;
        $project->ipidfour = $ipidfour;
        $project->ipnamefour = $ipnamefour;
        $project->ipcommfour = $ipcommfour;
        $project->goponeidfour = $goponeidfour;
        $project->goponenamefour = $goponenamefour;
        $project->goponecommfour = $goponecommfour;
        $project->goptwoidfour = $goptwoidfour;
        $project->goptwonamefour = $goptwonamefour;
        $project->goptwocommfour = $goptwocommfour;
        $project->leadidfour = $leadidfour;
        $project->leadnamefour = $leadnamefour;
        $project->leadcommfour = $leadcommfour;
        $project->preleadidfour = $preleadidfour;
        $project->preleadnamefour = $preleadnamefour;
        $project->preleadcommfour = $preleadcommfour;
        $project->totalfour = $totalcommfour;

        $project->save();

        \Session::flash('flash_message', 'successfully add project');
        return Redirect::route('listproject');

    }

    public function list(){

        $allproject = Project::all();
        $allproject = Project::orderBy('created_at','DESC')->get();
        $i = 1;
        $finalArray = array();
        

        foreach($allproject as $data){
            $agentarray = array(); 
            if($data->agentnameone != null){
                array_push($agentarray,$data->agentnameone);
            }
            if($data->agentnametwo != null){
                array_push($agentarray,$data->agentnametwo);
            }
            if($data->agentnamethree != null){
                array_push($agentarray,$data->agentnamethree);
            }
            if($data->agentnamefour != null){
                array_push($agentarray,$data->agentnamefour);
            }

            $temparray = [

                'id' => $data->id,
                'date' => $data->date,
                'agent' => $agentarray,
                'unit' => $data->unit,
                'spaprice' => $data->spaprice,
                'netselling' => $data->netselling,
                'status' => $data->status,

            ];

            array_push($finalArray,$temparray);
        
        }

        return view('admin/project/list', compact('finalArray','i'));

    }

    public function destroy($id,$type){

        $project = Project::find($id);
        $project->delete();

        $month = date('m', strtotime($project->date));
        $year = date("Y", strtotime($project->date));
        

        \Session::flash('flash_message_delete', 'successfully deleted.');
        if($type == 'month'){
            $status = 'all';
            return Redirect::route('getmonth', compact('month','year','status'));
        } else {
            return Redirect::route('listproject');
        }
       

    }


    public function details($id,$type){
        
        $detailsproject = Project::find($id);
        $agentarray = array();
        $leaderarray = array();
        $purchaserarray = array();

        $trone = null;
        $trtwo = null;
        $trthree = null;
        $trfour = null;

        if($detailsproject->agentnameone != null){
            array_push($agentarray,$detailsproject->agentnameone);

            $agone = $this->finduser($detailsproject->agentidone);
            if($agone->level == 'lead'){
                $trone = '90%';
            }  elseif($agone->level == 'prelead'){
                $trone = '80%';
            }  elseif($agone->level == 'consultant'){
                $trone = '70%';
            }  
        }
        if($detailsproject->agentnametwo != null){
            array_push($agentarray,$detailsproject->agentnametwo);
            $agtwo = $this->finduser($detailsproject->agentidtwo);
            if($agtwo->level == 'lead'){
                $trtwo = '90%';
            }  elseif($agtwo->level == 'prelead'){
                $trtwo = '80%';
            }  elseif($agtwo->level == 'consultant'){
                $trtwo = '70%';
            }  
        }
        if($detailsproject->agentnamethree != null){
            array_push($agentarray,$detailsproject->agentnamethree);
            $agthree = $this->finduser($detailsproject->agentidthree);
            if($agtwo->level == 'lead'){
                $trthree = '90%';
            }  elseif($agtwo->level == 'prelead'){
                $trthree = '80%';
            }  elseif($agtwo->level == 'consultant'){
                $trthree = '70%';
            } 
        }
        if($detailsproject->agentnamefour != null){
            array_push($agentarray,$detailsproject->agentnamefour);
            $agfour = $this->finduser($detailsproject->agentidfour);
            if($agtwo->level == 'lead'){
                $trfour = '90%';
            }  elseif($agtwo->level == 'prelead'){
                $trfour = '80%';
            }  elseif($agtwo->level == 'consultant'){
                $trfour = '70%';
            } 
        }

        if($detailsproject->leaderone != null){
            $detailsone = $this->finduser($detailsproject->leaderone);
            $detailsone->nickname;
            array_push($leaderarray,$detailsone->nickname);
        }   
        if($detailsproject->leadertwo != null){
            $detailstwo = $this->finduser($detailsproject->leadertwo);
            $detailstwo->nickname;
            array_push($leaderarray,$detailstwo->nickname);
        }
        if($detailsproject->leaderthree != null){
            $detailsthree = $this->finduser($detailsproject->leaderthree);
            $detailsthree->nickname;
            array_push($leaderarray,$detailsthree->nickname);
        }
        if($detailsproject->leaderfour != null){
            $detailsfour = $this->finduser($detailsproject->leaderfour);
            $detailsfour->nickname;
            array_push($leaderarray,$detailsfour->nickname);
        } 

        if($detailsproject->purchaser != null){
            array_push($purchaserarray,$detailsproject->purchaser);
        }
        if($detailsproject->purchasertwo != null){
            array_push($purchaserarray,$detailsproject->purchasertwo);
        }

        $month = date('m', strtotime($detailsproject->date));
        $year = date("Y", strtotime($detailsproject->date));
    
      

        return view('admin/project/detailsproject', compact('detailsproject','agentarray','leaderarray','purchaserarray','trone','trtwo','trthree','trfour','month','year','type'));
    }

    public function edit($id,$type){
        $alluser = $this->getUser();
        $detailsproject = Project::find($id);
        $leadernameone = null;
        $leadernametwo = null;
        $leadernamethree = null;
        $leadernamefour = null;

        if($detailsproject->leaderone != null){
            $detailsone = $this->finduser($detailsproject->leaderone);
            $leadernameone = $detailsone->nickname;
        }
        if($detailsproject->leadertwo != null){
            $detailstwo = $this->finduser($detailsproject->leadertwo);
            $leadernametwo = $detailstwo->nickname;
        }
        if($detailsproject->leaderthree != null){
            $detailsthree = $this->finduser($detailsproject->leaderthree);
            $leadernamethree = $detailsthree->nickname;
        }
        if($detailsproject->leaderfour != null){
            $detailsfour = $this->finduser($detailsproject->leaderfour);
            $leadernamefour = $detailsfour->nickname;
        }
        
        return view('admin/project/edit', compact('alluser','detailsproject','leadernameone','leadernametwo','leadernamethree','leadernamefour','type'));

    }

    public function update(Request $request){

        //start
        $agentnameone = null;
        $agentidone = null;
        $agentcommone = null;
        $ipidone = null;
        $ipnameone = null;
        $ipcommone = null;
        $goponeidone = null;
        $goponenameone = null;
        $goponecommone = null;
        $goptwoidone = null;
        $goptwonameone = null;
        $goptwocommone = null;
        $leadidone = null;
        $leadnameone = null;
        $leadcommone = null;
        $preleadidone = null;
        $preleadnameone = null;
        $preleadcommone = null;
        $totalcommone = 0;

        $agentnametwo = null;
        $agentidtwo = null;
        $agentcommtwo = null;
        $ipidtwo = null;
        $ipnametwo = null;
        $ipcommtwo = null;
        $goponeidtwo = null;
        $goponenametwo = null;
        $goponecommtwo = null;
        $goptwoidtwo = null;
        $goptwonametwo = null;
        $goptwocommtwo = null;
        $leadidtwo = null;
        $leadnametwo = null;
        $leadcommtwo = null;
        $preleadidtwo = null;
        $preleadnametwo = null;
        $preleadcommtwo = null;
        $totalcommtwo = 0;

        $agentnamethree = null;
        $agentidthree = null;
        $agentcommthree = null;
        $ipidthree = null;
        $ipnamethree = null;
        $ipcommthree = null;
        $goponeidthree = null;
        $goponenamethree = null;
        $goponecommthree = null;
        $goptwoidthree = null;
        $goptwonamethree = null;
        $goptwocommthree = null;
        $leadidthree = null;
        $leadnamethree = null;
        $leadcommthree = null;
        $preleadidthree = null;
        $preleadnamethree = null;
        $preleadcommthree = null;
        $totalcommthree = 0;

        $agentnamefour = null;
        $agentidfour = null;
        $agentcommfour = null;
        $ipidfour = null;
        $ipnamefour = null;
        $ipcommfour = null;
        $goponeidfour = null;
        $goponenamefour = null;
        $goponecommfour = null;
        $goptwoidfour = null;
        $goptwonamefour = null;
        $goptwocommfour = null;
        $leadidfour = null;
        $leadnamefour = null;
        $leadcommfour = null;
        $preleadidfour = null;
        $preleadnamefour = null;
        $preleadcommfour = null;
        $totalcommfour = 0;

    //end

        $id = $request->input('id');
        $date = $request->input('date');
        $unit = $request->input('unit');
        $purchaser = $request->input('purchaser');
        $purchasertwo = $request->input('purchasertwo');
        $agentone = $request->input('agentone');
        $agenttwo = $request->input('agenttwo');
        $agentthree = $request->input('agentthree');
        $agentfour = $request->input('agentfour');
        $spaprice = $request->input('spa');
        $netselling = $request->input('netselling');
        $percentcomm = $request->input('percentcomm');
        $percentpoolfund = $request->input('percentpoolfund');
        $percentleader = $request->input('percentleader');
        $percentcompany = $request->input('percentcompany');
        $percentpartner = $request->input('percentpartner');
        $leaderone = $request->input('leaderone');
        $leadertwo = $request->input('leadertwo');
        $leaderthree = $request->input('leaderthree');
        $leaderfour = $request->input('leaderfour');
        $status = $request->input('status');
        $type = $request->input('type');

        //general
        $general = $this->getgeneral($netselling,$percentcomm,$agentone,$agenttwo,$agentthree,$agentfour,$percentpoolfund,$leaderone,$leadertwo,$leaderthree,$leaderfour,$percentleader,$percentcompany,$percentpartner);
        
        //tiering process
        $percentsst = $general['commperperson'] * (0.06);
        $commpersondeductsst = number_format($general['commperperson'] - $percentsst,2,'.','');

        if($agentone != null){
            $agentcalculation = $this->gettiering($agentone,$commpersondeductsst);
            $agentnameone = $agentcalculation['agentname'];
            $agentidone = $agentcalculation['agentid'];
            $agentcommone = $agentcalculation['agentcomm'];
            $ipidone = $agentcalculation['ipid'];
            $ipnameone = $agentcalculation['ipname'];
            $ipcommone = $agentcalculation['ipcomm'];
            $goponeidone = $agentcalculation['goponeid'];
            $goponenameone = $agentcalculation['goponename'];
            $goponecommone = $agentcalculation['goponecomm'];
            $goptwoidone = $agentcalculation['goptwoid'];
            $goptwonameone = $agentcalculation['goptwoname'];
            $goptwocommone = $agentcalculation['goptwocomm'];
            $leadidone = $agentcalculation['leadid'];
            $leadnameone = $agentcalculation['leadname'];
            $leadcommone = $agentcalculation['leadcomm'];
            $preleadidone = $agentcalculation['preleadid'];
            $preleadnameone = $agentcalculation['preleadname'];
            $preleadcommone = $agentcalculation['preleadcomm']; 
            $totalcommone = $agentcalculation['total'];
            
        } 
        if($agenttwo != null){
            $agentcalculation = $this->gettiering($agenttwo,$commpersondeductsst);
            $agentnametwo = $agentcalculation['agentname'];
            $agentidtwo = $agentcalculation['agentid'];
            $agentcommtwo = $agentcalculation['agentcomm'];
            $ipidtwo = $agentcalculation['ipid'];
            $ipnametwo = $agentcalculation['ipname'];
            $ipcommtwo = $agentcalculation['ipcomm'];
            $goponeidtwo = $agentcalculation['goponeid'];
            $goponenametwo = $agentcalculation['goponename'];
            $goponecommtwo = $agentcalculation['goponecomm'];
            $goptwoidtwo = $agentcalculation['goptwoid'];
            $goptwonametwo = $agentcalculation['goptwoname'];
            $goptwocommtwo = $agentcalculation['goptwocomm'];
            $leadidtwo = $agentcalculation['leadid'];
            $leadnametwo = $agentcalculation['leadname'];
            $leadcommtwo = $agentcalculation['leadcomm'];
            $preleadidtwo = $agentcalculation['preleadid'];
            $preleadnametwo = $agentcalculation['preleadname'];
            $preleadcommtwo = $agentcalculation['preleadcomm']; 
            $totalcommtwo = $agentcalculation['total'];
           
        }
        if($agentthree != null){
            $agentcalculation = $this->gettiering($agentthree,$commpersondeductsst);
            $agentnamethree = $agentcalculation['agentname'];
            $agentidthree = $agentcalculation['agentid'];
            $agentcommthree = $agentcalculation['agentcomm'];
            $ipidthree = $agentcalculation['ipid'];
            $ipnamethree = $agentcalculation['ipname'];
            $ipcommthree = $agentcalculation['ipcomm'];
            $goponeidthree = $agentcalculation['goponeid'];
            $goponenamethree = $agentcalculation['goponename'];
            $goponecommthree = $agentcalculation['goponecomm'];
            $goptwoidthree = $agentcalculation['goptwoid'];
            $goptwonamethree = $agentcalculation['goptwoname'];
            $goptwocommthree = $agentcalculation['goptwocomm'];
            $leadidthree = $agentcalculation['leadid'];
            $leadnamethree = $agentcalculation['leadname'];
            $leadcommthree = $agentcalculation['leadcomm'];
            $preleadidthree = $agentcalculation['preleadid'];
            $preleadnamethree = $agentcalculation['preleadname'];
            $preleadcommthree = $agentcalculation['preleadcomm']; 
            $totalcommthree = $agentcalculation['total'];
        }
        if($agentfour != null){
            $agentcalculation = $this->gettiering($agentfour,$commpersondeductsst);
            $agentnamefour = $agentcalculation['agentname'];
            $agentidfour = $agentcalculation['agentid'];
            $agentcommfour = $agentcalculation['agentcomm'];
            $ipidfour = $agentcalculation['ipid'];
            $ipnamefour = $agentcalculation['ipname'];
            $ipcommfour = $agentcalculation['ipcomm'];
            $goponeidfour = $agentcalculation['goponeid'];
            $goponenamefour = $agentcalculation['goponename'];
            $goponecommfour = $agentcalculation['goponecomm'];
            $goptwoidfour = $agentcalculation['goptwoid'];
            $goptwonamefour = $agentcalculation['goptwofour'];
            $goptwocommfour = $agentcalculation['goptwocomm'];
            $leadidfour = $agentcalculation['leadid'];
            $leadnamefour = $agentcalculation['leadname'];
            $leadcommfour = $agentcalculation['leadcomm'];
            $preleadidfour = $agentcalculation['preleadid'];
            $preleadnamefour = $agentcalculation['preleadname'];
            $preleadcommfour = $agentcalculation['preleadcomm']; 
            $totalcommfour = $agentcalculation['total'];
        }

        $totalpayout = $totalcommone + $totalcommtwo + $totalcommthree + $totalcommfour;
        $tieringdiff = $general['netcomm'] - $totalpayout;

        //next how nak store dekat database (impoertant)
        $project = Project::find($id);
        $project->date = $date;
        $project->unit = $unit;
        $project->purchaser = $purchaser;
        $project->purchasertwo = $purchasertwo;
        $project->agentone = $agentone;
        $project->agenttwo = $agenttwo;
        $project->agentthree = $agentthree;
        $project->agentfour = $agentfour;
        $project->spaprice = $spaprice;
        $project->netselling = $netselling;
        $project->percentcomm = $percentcomm;
        $project->netcomm = $general['netcomm'];
        $project->commperperson = $general['commperperson'];
        $project->percentpoolfund = $percentpoolfund;
        $project->poolfundcomm = $general['poolfundcomm'];
        $project->leaderone = $leaderone;
        $project->leadertwo = $leadertwo;
        $project->leaderthree = $leaderthree;
        $project->leaderfour = $leaderfour;
        $project->percentleader = $percentleader;
        $project->leadercomm = $general['leadercomm'];
        $project->percentcompany = $percentcompany;
        $project->companycomm = $general['companycomm'];
        $project->percentpartner = $percentpartner;
        $project->theroofcomm = $general['theroofcomm'];
        $project->tieringdiff = $tieringdiff;
        $project->status = $status;
        $project->sst = $percentsst;
        $project->commpersondeductsst = $commpersondeductsst;
        $project->totalpayout = $totalpayout;

        $project->agentnameone = $agentnameone;
        $project->agentidone = $agentidone;
        $project->agentcommone = $agentcommone;
        $project->ipidone = $ipidone;
        $project->ipnameone = $ipnameone;
        $project->ipcommone = $ipcommone;
        $project->goponeidone = $goponeidone;
        $project->goponenameone = $goponenameone;
        $project->goponecommone = $goponecommone;
        $project->goptwoidone = $goptwoidone;
        $project->goptwonameone = $goptwonameone;
        $project->goptwocommone = $goptwocommone;
        $project->leadidone = $leadidone;
        $project->leadnameone = $leadnameone;
        $project->leadcommone = $leadcommone;
        $project->preleadidone = $preleadidone;
        $project->preleadnameone = $preleadnameone;
        $project->preleadcommone = $preleadcommone;
        $project->totalone = $totalcommone;

        $project->agentnametwo = $agentnametwo;
        $project->agentidtwo = $agentidtwo;
        $project->agentcommtwo = $agentcommtwo;
        $project->ipidtwo = $ipidtwo;
        $project->ipnametwo = $ipnametwo;
        $project->ipcommtwo = $ipcommtwo;
        $project->goponeidtwo = $goponeidtwo;
        $project->goponenametwo = $goponenametwo;
        $project->goponecommtwo = $goponecommtwo;
        $project->goptwoidtwo = $goptwoidtwo;
        $project->goptwonametwo = $goptwonametwo;
        $project->goptwocommtwo = $goptwocommtwo;
        $project->leadidtwo = $leadidtwo;
        $project->leadnametwo = $leadnametwo;
        $project->leadcommtwo = $leadcommtwo;
        $project->preleadidtwo = $preleadidtwo;
        $project->preleadnametwo = $preleadnametwo;
        $project->preleadcommtwo = $preleadcommtwo;
        $project->totaltwo = $totalcommtwo;

        $project->agentnamethree = $agentnamethree;
        $project->agentidthree = $agentidthree;
        $project->agentcommthree = $agentcommthree;
        $project->ipidthree = $ipidthree;
        $project->ipnamethree = $ipnamethree;
        $project->ipcommthree = $ipcommthree;
        $project->goponeidthree = $goponeidthree;
        $project->goponenamethree = $goponenamethree;
        $project->goponecommthree = $goponecommthree;
        $project->goptwoidthree = $goptwoidthree;
        $project->goptwonamethree = $goptwonamethree;
        $project->goptwocommthree = $goptwocommthree;
        $project->leadidthree = $leadidthree;
        $project->leadnamethree = $leadnamethree;
        $project->leadcommthree = $leadcommthree;
        $project->preleadidthree = $preleadidthree;
        $project->preleadnamethree = $preleadnamethree;
        $project->preleadcommthree = $preleadcommthree;
        $project->totalthree = $totalcommthree;

        $project->agentnamefour = $agentnamefour;
        $project->agentidfour = $agentidfour;
        $project->agentcommfour = $agentcommfour;
        $project->ipidfour = $ipidfour;
        $project->ipnamefour = $ipnamefour;
        $project->ipcommfour = $ipcommfour;
        $project->goponeidfour = $goponeidfour;
        $project->goponenamefour = $goponenamefour;
        $project->goponecommfour = $goponecommfour;
        $project->goptwoidfour = $goptwoidfour;
        $project->goptwonamefour = $goptwonamefour;
        $project->goptwocommfour = $goptwocommfour;
        $project->leadidfour = $leadidfour;
        $project->leadnamefour = $leadnamefour;
        $project->leadcommfour = $leadcommfour;
        $project->preleadidfour = $preleadidfour;
        $project->preleadnamefour = $preleadnamefour;
        $project->preleadcommfour = $preleadcommfour;
        $project->totalfour = $totalcommfour;

        $project->save();
        
        //return
        \Session::flash('flash_message','successfull updated');
        return Redirect::route('detailsproject', compact('id','type'));
    }

    public function listmonth(){

        $user = $this->getInfo();

        if($user){
            return view('/admin/project/listmonth');
        } else {
            return redirect('/');
        }

    }

    public function getmonth($month = '', $year = '', $status = ''){

        $user = $this->getInfo();
        $i = 1;
        $finalArray = array();

        $totalcases = 0;
        $totalnetselling = 0;
        $totalnetcomm = 0;
        $totalpoolfundcomm = 0;
        $totalcompanycomm = 0;
        $totaldiff = 0;

        if($status == null){
            $finalstatus = 'success';
        } else {
            $finalstatus = $status;
        }
        

        if($user){

            $monthname = $this->getmonthname($month); 

            //calculation
            if($status == 'all'){

                $calprojects = Project::whereMonth('date',$month)
                                 ->whereYear('date',$year)
                                 ->get();
                
                //allproject
                $allproject = Project::whereMonth('date',$month)
                ->whereYear('date',$year)
                ->orderBy('created_at','DESC')
                ->get();


            } else {

                $calprojects = Project::whereMonth('date',$month)
                                 ->whereYear('date',$year)
                                 ->where('status',$status)
                                 ->get();
                
                //allproject
                $allproject = Project::whereMonth('date',$month)
                ->whereYear('date',$year)
                ->where('status',$status)
                ->orderBy('created_at','DESC')
                ->get();


            }
            
            
            if($calprojects){

                $totalcases = count($calprojects);
    
                foreach($calprojects as $data){
                    
                    $totalnetselling = $totalnetselling + $data->netselling;
                    $totalpoolfundcomm = $totalpoolfundcomm + $data->poolfundcomm;
                    $totalnetcomm = $totalnetcomm + $data->netcomm;
                    $totalcompanycomm = $totalcompanycomm + $data->companycomm;
                    $totaldiff = $totaldiff + $data->tieringdiff;

                }

            }                    

           
            
           
            foreach($allproject as $data){

                $agentarray = array(); 
                if($data->agentnameone != null){
                    array_push($agentarray,$data->agentnameone);
                }
                if($data->agentnametwo != null){
                    array_push($agentarray,$data->agentnametwo);
                }
                if($data->agentnamethree != null){
                    array_push($agentarray,$data->agentnamethree);
                }
                if($data->agentnamefour != null){
                    array_push($agentarray,$data->agentnamefour);
                }

                $temparray = [

                    'id' => $data->id,
                    'date' => $data->date,
                    'agent' => $agentarray,
                    'unit' => $data->unit,
                    'spaprice' => $data->spaprice,
                    'netselling' => $data->netselling,
                    'status' => $data->status,

                ];

                array_push($finalArray,$temparray);

            }

            return view('/admin/project/monthinfo', compact('finalstatus','month','year','monthname','finalArray','i','totalcases','totalnetselling','totalnetcomm','totalpoolfundcomm','totaldiff','totalcompanycomm'));
        } else {
            return redirecT('/');
        }

    }

    public function chartproject(){

        $currentYear = date("Y");
        $monthArray = [];

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

        $calprojects = Project::whereYear('date',$currentYear)
                            ->where('status','success')
                            ->get();
        
        if($calprojects){

            foreach($calprojects as $data){

                $tempdate = $data->date;
                $d = date_parse_from_format("Y-m-d", $tempdate);
                
                if ($d["month"] == '1') {
                    $totalJan = $totalJan + $data->companycomm;
                } else if ($d["month"] == '2') {
                    $totalFeb = $totalFeb + $data->companycomm;
                } else if ($d["month"] == '3') {
                    $totalMac = $totalMac + $data->companycomm;
                } else if ($d["month"] == '4') {
                    $totalApril = $totalApril + $data->companycomm;
                } else if ($d["month"] == '5') {
                    $totalMei = $totalMei + $data->companycomm;
                } else if ($d["month"] == '6') {
                    $totalJune = $totalJune + $data->companycomm;
                } else if ($d["month"] == '7') {
                    $totalJuly = $totalJuly + $data->companycomm;
                } else if ($d["month"] == '8') {
                    $totalAugust = $totalAugust + $data->companycomm;
                } else if ($d["month"] == '9') {
                    $totalSept = $totalSept + $data->companycomm;
                } else if ($d["month"] == '10') {
                    $totalOct = $totalOct + $data->companycomm;
                } else if ($d["month"] == '11') {
                    $totalNov = $totalNov + $data->companycomm;
                } else if ($d["month"] == '12') {
                    $totalDec = $totalDec + $data->companycomm;
                }

            }
        }
  
        $monthArray['1'] = number_format($totalJan,2,'.','');
		$monthArray['2'] = number_format($totalFeb,2,'.','');
		$monthArray['3'] = number_format($totalMac,2,'.','');
		$monthArray['4'] = number_format($totalApril,2,'.','');
		$monthArray['5'] = number_format($totalMei,2,'.','');
		$monthArray['6'] = number_format($totalJune,2,'.','');
		$monthArray['7'] = number_format($totalJuly,2,'.','');
		$monthArray['8'] = number_format($totalAugust,2,'.','');
		$monthArray['9'] = number_format($totalSept,2,'.','');
		$monthArray['10'] = number_format($totalOct,2,'.','');
		$monthArray['11'] = number_format($totalNov,2,'.','');
		$monthArray['12'] = number_format($totalDec,2,'.','');

		return response()->json($monthArray);

    }

    public function statusmonth(Request $request){
        
        $status = $request->input('status');
        $month = $request->input('month');
        $year = $request->input('year');

        return redirect()->route('getmonth', ['month'=>$month,'year'=>$year,'status'=>$status]);
       

    }

    public function dashboardstatus($status =''){

        $currentYear = date("Y");
        $monthArray = [];

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

        $calprojects = Project::whereYear('date',$currentYear)
                            ->where('status',$status)
                            ->get();
        
        if($calprojects){

            foreach($calprojects as $data){

                $tempdate = $data->date;
                $d = date_parse_from_format("Y-m-d", $tempdate);
                
                if ($d["month"] == '1') {
                    $totalJan = $totalJan + $data->companycomm;
                } else if ($d["month"] == '2') {
                    $totalFeb = $totalFeb + $data->companycomm;
                } else if ($d["month"] == '3') {
                    $totalMac = $totalMac + $data->companycomm;
                } else if ($d["month"] == '4') {
                    $totalApril = $totalApril + $data->companycomm;
                } else if ($d["month"] == '5') {
                    $totalMei = $totalMei + $data->companycomm;
                } else if ($d["month"] == '6') {
                    $totalJune = $totalJune + $data->companycomm;
                } else if ($d["month"] == '7') {
                    $totalJuly = $totalJuly + $data->companycomm;
                } else if ($d["month"] == '8') {
                    $totalAugust = $totalAugust + $data->companycomm;
                } else if ($d["month"] == '9') {
                    $totalSept = $totalSept + $data->companycomm;
                } else if ($d["month"] == '10') {
                    $totalOct = $totalOct + $data->companycomm;
                } else if ($d["month"] == '11') {
                    $totalNov = $totalNov + $data->companycomm;
                } else if ($d["month"] == '12') {
                    $totalDec = $totalDec + $data->companycomm;
                }

            }
        }
  
        $monthArray['1'] = number_format($totalJan,2,'.','');
		$monthArray['2'] = number_format($totalFeb,2,'.','');
		$monthArray['3'] = number_format($totalMac,2,'.','');
		$monthArray['4'] = number_format($totalApril,2,'.','');
		$monthArray['5'] = number_format($totalMei,2,'.','');
		$monthArray['6'] = number_format($totalJune,2,'.','');
		$monthArray['7'] = number_format($totalJuly,2,'.','');
		$monthArray['8'] = number_format($totalAugust,2,'.','');
		$monthArray['9'] = number_format($totalSept,2,'.','');
		$monthArray['10'] = number_format($totalOct,2,'.','');
		$monthArray['11'] = number_format($totalNov,2,'.','');
		$monthArray['12'] = number_format($totalDec,2,'.','');

		return response()->json($monthArray);
        
    }

    public function dashboardcardstatus($status = ''){
        
       
        $totalcases = 0;
        $totalnetselling = 0;
        $totalnetcomm = 0;
        $totalpoolfundcomm = 0;
        $totalcompanycomm = 0;
        $totaldiff = 0;

        $currentYear = date("Y");
        $calprojects = Project::whereYear('date',$currentYear)
        ->where('status',$status)
        ->get();

        if($calprojects){

            $totalcases = count($calprojects);

            foreach($calprojects as $data){

            $totalnetselling = $totalnetselling + $data->netselling;
            $totalpoolfundcomm = $totalpoolfundcomm + $data->poolfundcomm;
            $totalnetcomm = $totalnetcomm + $data->netcomm;
            $totalcompanycomm = $totalcompanycomm + $data->companycomm;
            $totaldiff = $totaldiff + $data->tieringdiff;

            }

        } 
        
        $finalarray = [
            'totalcases' => $totalcases,
            'totalnetselling' => number_format($totalnetselling,2,'.',''),
            'totalpoolfundcomm' => number_format($totalpoolfundcomm,2,'.',''),
            'totalnetcomm' => number_format($totalnetcomm,2,'.',''),
            'totalcompanycomm' => number_format($totalcompanycomm,2,'.',''),
            'totaldiff' => number_format($totaldiff,2,'.',''),
        ];

        return response()->json($finalarray);


    }

    public function paymentvoucher(){

        $list = Projectvoucher::orderby('created_at','DESC')->get();

        $list = DB::table('projectvouchers')
                ->join('users','users.id','=','projectvouchers.agentid')
                ->select('projectvouchers.*','users.nickname as nickname')
                ->orderBy('projectvouchers.created_at','DESC')
                ->get();

        $agent = User::where('role','agent')->get();

        $currentdate = date('Y-m-d');
        $i = 1;
        
        return view('admin/project/voucher', compact('list','agent','currentdate','i'));

    }

    public function storepaymentvoucher(Request $request){
        
        $agentid = $request->input('agent');
        $date = $request->input('date');
        $vouchernumber = $request->input('vouchernumber');
        $address = $request->input('address');

        $agentdetails = User::find($agentid);
     

        if($agentdetails){

            $data = new Projectvoucher;
            $data->agentid = $agentid;
            $data->date = $date;
            $data->vouchernumber = $vouchernumber;
            $data->address = $address;
            $data->save();
            \Session::flash('flash_message', 'successfully add voucher');
            return Redirect::route('paymentvoucherproject');

        } else {
            return Redirect::route('paymentvoucherproject');
        }

    }

    public function destroyvoucher($id){
        $data = Projectvoucher::find($id);
        $data->delete($data->id);
        \Session::flash('flash_message_delete','success deleted');
        return Redirect::route('paymentvoucherproject');
    }

    public function detailsprojectvoucher($id){
        
        $details = Projectvoucher::find($id);
        $agentinfo = User::where('id',$details->agentid)->first();

        $formatdate = date("d-M-Y", strtotime($details->date));
        
        return view('admin/project/voucherdetails', compact('details','agentinfo','formatdate'));

    }
}
