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
        $data['graph_list']=$res=$this->getChart_value();
        $str="";
        foreach($res as $k =>$val)
        {
            $str.="['".$k."',".$val."],";
        }
       // dd($str);
        $data['graph_list']=$str;
        return view('mngr.dashbord',$data);
    }

    public function getChart_value()
    {
        $aPs=Donner::where('blood_group',1)->get()->count();
        $bPs=Donner::where('blood_group',2)->get()->count();
        $abPs=Donner::where('blood_group',3)->get()->count();
        $oPs=Donner::where('blood_group',4)->get()->count();
        $aNs=Donner::where('blood_group',5)->get()->count();
        $bNs=Donner::where('blood_group',6)->get()->count();
        $abNs=Donner::where('blood_group',7)->get()->count();
        $oNs=Donner::where('blood_group',8)->get()->count();

        $data_arr=array(
            'A+ve'  =>$aPs,
            'B+ve'  =>$bPs,
            'AB+ve' =>$abPs,
            'O+ve'  =>$oPs,
            'A-ve'  =>$aNs,
            'B-ve'  =>$bNs,
            'AB-ve' =>$abNs,
            'O-ve'  =>$oNs
        );

        return $data_arr;
        
    }
}
