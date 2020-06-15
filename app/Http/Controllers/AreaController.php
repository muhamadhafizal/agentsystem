<?php

namespace App\Http\Controllers;
use App\Area;
use Redirect;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(){

        $area = Area::all();
        $i = 1;
        return view('/admin/area/index', compact('area','i'));

    }

    public function store(Request $request){

        $area = $request->input('area');
        
        $data = new Area;
        $data->name = $area;
        $data->save();

        \Session::flash('flash_message', 'successfully add area');
        return Redirect::route('listarea');

    }

    public function destroy($id){

        $area = Area::find($id);
        $area->delete($area->id);

        \Session::flash('flash_message_delete', 'successfully deleted.');
        return Redirect::route('listarea');

    }

    public function details($id){
        
        $areadetails = Area::find($id);

        return response()->json($areadetails);

    }
}
