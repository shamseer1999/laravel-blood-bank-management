<?php

namespace App\Http\Controllers;

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
