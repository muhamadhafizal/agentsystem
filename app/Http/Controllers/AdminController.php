<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

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
        $totalprofit = 0;
        $totalsst = 0;
        $totalgdp = 0;
        $totalpayoutcomm = 0;

        if($user){

            $year = date("Y");

            $cardrental = DB::table('rentals')
            ->join('users','users.id','=','rentals.agent')
            ->select('rentals.*','users.nickname as nickname')
            ->whereYear('rentals.date','=',$year)
            ->where('rentals.status','=','success')
            ->orderBy('rentals.date','DESC')
            ->get();

            $rentalcount = count($cardrental);
            foreach ($cardrental as $data){
                $totalprofit = $totalprofit + $data->profitcompany;
                $totalsst = $totalsst + $data->percentsst;
                $totalgdp = $totalgdp + $data->gdp;
                $totalpayoutcomm = $totalpayoutcomm + $data->totalpayoutcomm;
            }

            return view('admin/index', compact('rentalcount','totalprofit','totalsst','totalgdp','totalpayoutcomm'));
        } else {
            return redirect('/');
        }

    }
}
