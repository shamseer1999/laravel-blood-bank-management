<?php

namespace App\Http\Controllers;

use App\Models\Donner;
use App\Models\donnetedUser;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Rap2hpoutre\FastExcel\FastExcel;

use Image;

class DonnerController extends Controller
{
    public function index(Request $request)
    {
        if($request->filter == 'clear')
        {
            return redirect()->route('donners');
        }
        
        $donners=Donner::with('districts','recentDonnated')->when($request->fname !=null,function($query) use($request){
            return $query->where('first_name','like','%'.$request->fname.'%');
        })
        ->when($request->lname !=null,function($query) use($request){
            return $query->where('last_name','like','%'.$request->lname.'%');
        })
        ->when($request->district !=null,function($query) use($request){
            return $query->where('district','=',$request->district);
        })
        ->when($request->group !=null,function($query) use($request){
            return $query->where('blood_group','=',$request->group);
        })
        ->when($request->start !=null,function($query) use($request){
            return $query->whereDate('created_at','>=',$request->start);
        })
        ->when($request->end !=null,function($query) use($request){
            return $query->whereDate('created_at','<=',$request->end);
        })
        ->paginate(10);

        //Excel download
        if($request->filter == 'Export Data')
        {
            $donner=collect($donners->toArray()['data']);

           // dd($donner);
           $excelData=$donner->map(function($donner,$key){
                $coll=(object)$donner;
                return[
                    'name'=>$coll->first_name.' '.$coll->last_name,
                    'Phone' =>$coll->phone,
                    'City' =>$coll->city,
                    'District' =>$coll->districts['district_name'],
                    'Blood Group'=>$coll->blood_group_text
                ];
           });
           //dd($a);
           return (new FastExcel($excelData))->download('donners-list.xlsx');
        }

        // dd($donners);

        $data['districts']=DB::table('districts')->get();
        $data['result']=$donners;
        return view('mngr.donner.index',$data);
        
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            
            $validated=$request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'phone'=>'required|unique:donners',
                'email'=>'required',
                'city'=>'required',
                'district'=>'required',
                'address'=>'required',
                'age'=>'required',
                'dob'=>'required',
                'job'=>'required',
                'height'=>'required',
                'weight'=>'required',
                'blood'=>'required'
            ]);

            $filename='';
            if(request()->hasFile('pr_image'))
            {
                 $extension=request('pr_image')->extension();
                 $filename="user_profile_".time().'.'.$extension;
                // //Fullsize store
                 request('pr_image')->storeAs('public/profile',$filename);

                //resize
                //$image_resize=Image::make(request('pr_image'));
            }

            $insert_data=array(
                'first_name'=>$validated['first_name'],
                'last_name'=>$validated['last_name'],
                'phone'=>$validated['phone'],
                'email'=>$validated['email'],
                'city'=>$validated['city'],
                'district'=>$validated['district'],
                'address'=>$validated['address'],
                'profile_image'=>$filename,
                'age'=>$validated['age'],
                'dob'=>$validated['dob'],
                'donner_job'=>$validated['job'],
                'height'=>$validated['height'],
                'weight'=>$validated['weight'],
                'blood_group'=>$validated['blood']
            );
            Donner::create($insert_data);
            return redirect(route('donners'))->with('success','New donner added successfully');

            
        }
        $data['districts']=DB::table('districts')->get();
        return view('mngr.donner.add',$data);
    }

    public function view($id)
    {
        $donner_id=decrypt($id);
        $donner_details=Donner::where('id',$donner_id)->first();
        $data['result']=$donner_details;
        return view('mngr.donner.view',$data);
    }

    public function edit(Request $request,$id)
    {
        $donner_id=decrypt($id);
        $edit_data=Donner::find($donner_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'city'=>'required',
                'district'=>'required',
                'address'=>'required',
                'age'=>'required',
                'job'=>'required',
                'height'=>'required',
                'weight'=>'required',
                'blood'=>'required'
            ]);

            $edit_data->first_name=$validated['first_name'];
            $edit_data->last_name=$validated['last_name'];
            $edit_data->city=$validated['city'];
            $edit_data->district=$validated['district'];
            $edit_data->address=$validated['address'];
            $edit_data->age=$validated['age'];
            $edit_data->donner_job=$validated['job'];
            $edit_data->height=$validated['height'];
            $edit_data->weight=$validated['weight'];
            $edit_data->blood_group=$validated['blood'];
            $edit_data->save();

            return redirect(route('donners'))->with('success','Donner updated successfully');
        }

        $data['districts']=DB::table('districts')->get();

        $data['edit_data']=$edit_data;

        return view('mngr.donner.edit',$data);
    }

    public function addRecentDonators(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $validated = $request->validate([
                'donnated_date' =>'required',
                'district' =>'required',
                'donners' =>'required'
            ]);

            $insert_data = array(
                'donated_date' =>$validated['donnated_date'],
                'donner_id' =>$validated['donners']
            );

            donnetedUser::create($insert_data);

            return redirect(route('recent_donners'))->with('success','Donner donated sdetails updated successfully');

        }
        $data['districts']=DB::table('districts')->get();
        return view('mngr.donner.add_recent_donners',$data);
    }

    public function getUsers(Request $request)
    {
        $dist_id = $request->dist_id;
        // return response()->json(['id'=>$dist_id]);
        $donners = Donner::where('district',$dist_id)->get();
        return response()->json($donners);
    }

    public function recentDonners(Request $request)
    {
        $date = date('Y-m-d',strtotime('-90 days'));
        // dd($date);
        $result =donnetedUser::with('Donners')->whereDate('donated_date','>=',$date)->paginate(10);
        // dd($result);

        $data['result'] = $result;

        return view('mngr.donner.recent_donners',$data);
    }
}
