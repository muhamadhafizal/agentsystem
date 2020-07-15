<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class ExcelController extends Controller
{
    public function agent() 
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }
}