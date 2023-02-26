<?php

namespace App\Http\Controllers;

use App\Models\Donner;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Image;

class DonnerController extends Controller
{
    public function index()
    {
        $donners=Donner::paginate(10);

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
                'address'=>'required'
            ]);

            $filename='';
            if(request()->hasFile('pr_image'))
            {
                 $extension=request('pr_image')->extension();
                 $filename="user_profile_".time().'.'.$extension;
                // //Fullsize store
                 request('pr_image')->storeAs('profile',$filename);

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
                'profile_image'=>$filename
            );
            Donner::create($insert_data);
            return redirect(route('dashbord'))->with('success','New donner added successfully');

            
        }
        $data['districts']=DB::table('districts')->get();
        return view('mngr.donner.add',$data);
    }
}
