<?php

namespace App\Exports;

use App\Project;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ProjectExport implements FromCollection, WithHeadings
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
        

        $allprojects = DB::table('projects')
                        ->select('projects.date',
                                 'projects.unit',
                                 'projects.purchaser',
                                 'projects.agentnameone',
                                 'projects.agentnametwo',
                                 'projects.agentnamethree',
                                 'projects.agentnamefour',
                                 'projects.spaprice',
                                 'projects.netselling',
                                 'projects.netcomm',
                                 'projects.commperperson',
                                 'projects.poolfundcomm',
                                 'projects.leaderone',
                                 'projects.leadertwo',
                                 'projects.leaderthree',
                                 'projects.leaderfour',
                                 'projects.leadercomm',
                                 'projects.companycomm',
                                 'projects.theroofcomm',
                                 'projects.tieringdiff',
                                 )
                            ->whereYear('projects.date','=',$this->year)
                            ->whereMonth('projects.date','=',$this->month)
                            ->orderBy('projects.date','DESC')
                            ->get();

        if($allprojects){
            $projectarray = [];
            
            
            foreach($allprojects as $data){
                $onename = null;
                $twoname = null;
                $threename = null;
                $fourname = null;
                if($data->leaderone != null){

                    $oneinfo = User::find($data->leaderone);
                    $onename = $oneinfo->nickname;

                }

                if($data->leadertwo != null){

                    $twoinfo = User::find($data->leadertwo);
                    $twoname = $twoinfo->nickname;

                }

                if($data->leaderthree != null){

                    $threeinfo = User::find($data->leaderthree);
                    $threename = $threeinfo->nickname;

                }

                if($data->leaderfour != null){

                    $fourinfo = User::find($data->leaderfour);
                    $fourname = $fourinfo->nickname;

                }

               $temparray = [ 

                'date' => $data->date,
                'unit' => $data->unit,
                'purchaser' => $data->purchaser,
                'agentnameone' => $data->agentnameone,
                'agentnametwo' => $data->agentnametwo,
                'agentnamethree' => $data->agentnamethree,
                'agentnamefour' => $data->agentnamefour,
                'spaprice' => $data->spaprice,
                'netselling' => $data->netselling,
                'netcomm' => $data->netcomm,
                'commperperson' => $data->commperperson,
                'poolfundcomm' => $data->poolfundcomm,
                'leaderone' => $onename,
                'leadertwo' => $twoname,
                'leaderthree' => $threename,
                'leaderfour' => $fourname,
                'leadercomm' => $data->leadercomm,
                'companycomm' => $data->companycomm,
                'theroofcomm' => $data->theroofcomm,
                'tieringdiff' => $data->tieringdiff,
               ];

               array_push($projectarray,$temparray);

            }
        //    $format = parse_str($projectarray);
            return collect($projectarray);

        } else {

            return $allprojects;
        }
        
        
    }


    public function headings(): array
    {
      

        return [
            'Date',
            'Unit',
            'Purchaser',
            'Agentnameone',
            'Agentnametwo',
            'Agentnamethree',
            'Agentnamefour',
            'Spaprice',
            'Netselling',
            'Netcomm',
            'Commperperson',
            'Poolfundcomm',
            'Leaderone',
            'Leadertwo',
            'Leaderthree',
            'Leaderfour',
            'Leadercomm',
            'Companycomm',
            'Theroofcomm',
            'Tieringdiff'
        ];
    }
}

    