<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\RentalExport;
use App\Exports\ProjectExport;

class ExcelController extends Controller
{
    public function agent() 
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }

    public function excelrentalmonth($month='',$year=''){
        
        $filename = 'rental'.$month.$year. '.xlsx';
        return Excel::download(new RentalExport($month,$year), $filename);

    }

    public function excelprojectmonth($month='',$year='',$status=''){
        
        $filename = 'project'.$month.$year.'.xlsx';
        return Excel::download(new ProjectExport($month,$year,$status),$filename);
    }
}