<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data['result']=Role::paginate(10);
        //dd($data['result']);
        return view('mngr.roles.index',$data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'role_name'=>'required'
            ]);
    
            $insert_data=array(
                'role_name'=>$validated['role_name']
            );

            Role::create($insert_data);

            return redirect()->route('roles')->with('success','Role created successfully');
        }   
       
        return view('mngr.roles.add');
    }

    public function edit(Request $request,$id)
    {
        $role_id=decrypt($id);
        $edit_data=Role::find($role_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'role_name'=>'required'
            ]);

            $edit_data->role_name=$validated['role_name'];
            $edit_data->save();

            return redirect()->route('roles')->with('success','Role updated successfully');
        }
        $data['edit_data']=$edit_data;
        return view('mngr.roles.edit',$data);
        
    }
}
