<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectagentController extends Controller
{
    public function index(){
        return view('agent/project/index');
    }
}
