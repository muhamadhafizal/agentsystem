<?php

namespace App\Exports;

use App\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class RentalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $month;
    protected $year;

    function __construct($month,$year) {
            $this->month = $month;
            $this->year = $year;
     }

    public function collection()
    {
        $allrental = DB::table('rentals')
                    ->join('users','users.id','=','rentals.agent')
                    ->select('rentals.num',
                             'rentals.date',
                             'users.nickname',
                             'rentals.stemduty',
                             'rentals.agreementfee',
                             'rentals.fee',
                             'rentals.percentsst',
                             'rentals.commin',
                             'rentals.netcomm',
                             'rentals.percentagent',
                             'rentals.percentip',
                             'rentals.percentgopone',
                             'rentals.percentgoptwo',
                             'rentals.percentlead',
                             'rentals.percentprelead',
                             'rentals.profitcompany',
                             'rentals.totalpayoutcomm',
                             'rentals.gdp',
                             'rentals.status')  
                    ->whereYear('rentals.date','=',$this->year)
                    ->whereMonth('rentals.date','=',$this->month)
                    ->orderBy('rentals.date','DESC')
                    ->get();
        
        return $allrental;
    }


    public function headings(): array
    {
        return [
            'CpNum',
            'Date',
            'Agent',
            'StemDuty',
            'AgreementFee',
            'TotalComm',
            'SST',
            'CommIn',
            'NetComm',
            'AgentPercent',
            'IP',
            'GOP1',
            'GOP2',
            'Lead',
            'Prelead',
            'CompanyProfit',
            'TotalPayout',
            'GDP',
            'Status'
        ];
    }
}

    