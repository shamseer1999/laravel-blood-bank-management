<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donner;

class DashbordController extends Controller
{
    
    public function index()
    {
        $today=date('Y-m-d H:i:s');
        $prev_date=date('Y-m-d H:i:s',strtotime('-1 month'));

        $data['total_donners']=Donner::all()->count();
        $data['total_mlp_donners']=Donner::where('district',5)->get()->count();
        $data['total_latest_donners']=Donner::whereBetween('created_at',[$prev_date,$today])->get()->count();
        //dd($data['total_latest_donners']);
        return view('mngr.dashbord',$data);
    }
}
