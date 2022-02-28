<?php

namespace App\Http\Controllers;
use App\User;
use App\Letter;
use Redirect;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class LetterController extends Controller
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
        
        $user = $this->getinfo();

        $letters = Letter::where('agent_id',$user->id)->where('status',0)->get();

        $i = 1;

        return view('agent/letter/index', compact('letters','i'));
    }

    public function add(){


        return view('agent/letter/add');
    }

    public function store(Request $request){

        $userinfo = $this->getinfo();

        $name = $request->input('name');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $date = $request->input('date');
        $authorized = $request->input('authorized');
        $sellingprice = $request->input('sellingprice');
        $agencyfee = $request->input('agencyfee');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        if($userinfo){

            $letter = new Letter;
            $letter->name = $name;
            $letter->ic = $ic;
            $letter->contact = $contact;
            $letter->date = $date;
            $letter->authorized = $authorized;
            $letter->sellingprice = $sellingprice;
            $letter->agencyfee = $agencyfee;
            $letter->startdate = $startdate;
            $letter->enddate = $enddate;
            $letter->agent_id = $userinfo->id;
            $letter->save();

            \Session::flash('flash_message', 'successfully save confirmation on letter');

        }

        return Redirect::route('agentlistletter');

    }

    public function destroy($id){

        $letter = Letter::find($id);
        $letter->status = 1;
        $letter->save();

        \Session::flash('flash_message_delete','success deleted letter');
        return Redirect::route('agentlistletter');

    }

    public function edit($id){

        $letter = Letter::find($id);

        return view('agent/letter/edit', compact('letter'));

    }

    public function update(Request $request){

        $letter_id = $request->input('letter_id');
        $name = $request->input('name');
        $ic = $request->input('ic');
        $contact = $request->input('contact');
        $date = $request->input('date');
        $authorized = $request->input('authorized');
        $sellingprice = $request->input('sellingprice');
        $agencyfee = $request->input('agencyfee');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');


        $letter = Letter::find($letter_id);
        $letter->name = $name;
        $letter->ic = $ic;
        $letter->contact = $contact;
        $letter->date = $date;
        $letter->authorized = $authorized;
        $letter->sellingprice = $sellingprice;
        $letter->agencyfee = $agencyfee;
        $letter->startdate = $startdate;
        $letter->enddate = $enddate;

        $letter->save();

        $id = $letter_id;

        \Session::flash('flash_message', 'successfully update letter');
        return Redirect::route('editletter', compact('id'));
    }

    public function detail($id){
        
        $userinfo = $this->getinfo();
        $letter = Letter::find($id);

        return view('/agent/letter/detail', compact('userinfo','letter'));

    }
}
