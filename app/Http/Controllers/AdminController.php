<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rental;
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

    public function chartrental(){

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

        $tempChart = Rental::whereYear('date','=', $currentYear)
                ->where('status','=', 'success')
                ->get();

        foreach($tempChart as $data){

            $tempdate = $data->date;
            $d = date_parse_from_format("Y-m-d", $tempdate);

            if ($d["month"] == '1') {
                $totalJan = $totalJan + $data->gdp;
            } else if ($d["month"] == '2') {
                $totalFeb = $totalFeb + $data->gdp;
            } else if ($d["month"] == '3') {
                $totalMac = $totalMac + $data->gdp;
            } else if ($d["month"] == '4') {
                $totalApril = $totalApril + $data->gdp;
            } else if ($d["month"] == '5') {
                $totalMei = $totalMei + $data->gdp;
            } else if ($d["month"] == '6') {
                $totalJune = $totalJune + $data->gdp;
            } else if ($d["month"] == '7') {
                $totalJuly = $totalJuly + $data->gdp;
            } else if ($d["month"] == '8') {
                $totalAugust = $totalAugust + $data->gdp;
            } else if ($d["month"] == '9') {
                $totalSept = $totalSept + $data->gdp;
            } else if ($d["month"] == '10') {
                $totalOct = $totalOct + $data->gdp;
            } else if ($d["month"] == '11') {
                $totalNov = $totalNov + $data->gdp;
            } else if ($d["month"] == '12') {
                $totalDec = $totalDec + $data->gdp;
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
}
