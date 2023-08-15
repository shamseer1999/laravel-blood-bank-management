<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Models\User;

class AdminsController extends Controller
{
    public function index()
    {
        $result=User::withTrashed()->paginate(10);
        $data['result']=$result;

        return view('mngr.admins.index',$data);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $validated = $request->validate([
                'name' =>'required',
                'email' =>'required|unique:users,email',
                'username' =>'required|unique:users,username',
                'password' =>'required',
                'role' =>'required',
                'phone' =>'required'
            ],[
                'email.unique' =>'This email is already used',
                'username.unique' =>'This username is already used'
            ]);

            $ins_arr = array(
                'name' =>$validated['name'],
                'email' =>$validated['email'],
                'password' =>bcrypt($validated['password']),
                'username' =>$validated['username'],
                'phone' =>$validated['phone'],
                'role_id' =>$validated['role']
            );

            User::create($ins_arr);

            return redirect()->route('admins')->with('success','New admin created successfully');
        }
        $data['roles'] = Role::where('status',1)->get();
        return view('mngr.admins.add',$data);
    }
    public function edit(Request $request,$id)
    {
        $adm_id=decrypt($id);
        $edit_data=User::find($adm_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name'=>'required',
                'email'=>'required'
            ]);

            $edit_data->name=$validated['name'];
            $edit_data->email=$validated['email'];
            $edit_data->save();

            return redirect()->route('admins')->with('success','Admin updated successfully');

        }

        $data['edit_data']=$edit_data;
        return view('mngr.admins.edit',$data);
    }
    public function delete($id)
    {
        $adm_id=decrypt($id);
        User::find($adm_id)->delete();

        return redirect()->route('admins')->with('success','Admin deleted successfully');
    }

    public function activate($id)
    {
        $adm_id=decrypt($id);
        $user=User::withTrashed()->find($adm_id);
        $user->restore();

        return redirect()->route('admins')->with('success','Admin activated successfully');
    }
}
