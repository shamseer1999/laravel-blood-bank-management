<?php

use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DonnerController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\RoleController;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['GET','POST'],'/', function (Request $request) {
    if($request->isMethod('post'))
    {
        $username=request('username');
        $password=request('password');
        $remember=request('remember');

        $credential=array(
            'username'=>$username,
            'password'=>$password,
            'deleted_at'=>NULL
        );

        if(!empty($remeber)){
            if(auth($credential,true))
            {
                return redirect(route('dashbord'))->with('success','Admin logged successfully');
            }
        }elseif(auth()->attempt($credential))
        {
            return redirect(route('dashbord'))->with('success','Admin logged successfully');
        }
        else
        {
            return redirect(route('login'))->with('danger','Invalid login credantials');
        }
    }
    return view('login');
})->name('login');

Route::get('/register',function(){
    $data['roles']=Role::all();
    return view('admin.register',$data);
})->name('register');

Route::post('/register',function(Request $request){
    $validate=$request->validate([
        'name'=>'required',
        'email'=>'required',
        'roles'=>'required',
        'phone'=>'required|unique:users',
        'username'=>'required|unique:users',
        'password'=>'required'
    ]);
    User::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>bcrypt(request('password')),
        'username'=>request('username'),
        'phone'=>request('phone'),
        'role_id'=>request('roles')

    ]);
    return redirect(route('dashbord'))->with('success','Admin registerd successfully');
})->name('register_data');

Route::middleware('logged_user')->group(function(){
    Route::get('/dashbord',[DashbordController::class,'index'])->name('dashbord');

    //Donners
    Route::match(['get','post'],'/donner-register',[DonnerController::class,'add'])->name('add_donner');
    Route::get('/all-donners',[DonnerController::class,'index'])->name('donners');
    Route::get('/view-donner{donner_id}',[DonnerController::class,'view'])->name('view_donner');
    Route::match(['get','post'],'/edit-donner{donner_id}',[DonnerController::class,'edit'])->name('edit_donner');

    //Admins
    Route::get('/admins',[AdminsController::class,'index'])->name('admins')->middleware('user_role:Super Admin');
    Route::match(['get','post'],'/edit{adm_id}',[AdminsController::class,'edit'])->name('admin_edit')->middleware('user_role:Super Admin');
    Route::get('delete-admin{adm_id}',[AdminsController::class,'delete'])->name('admin_delete')->middleware('user_role:Super Admin');
    Route::get('activate-admin{adm_id}',[AdminsController::class,'activate'])->name('admin_activate')->middleware('user_role:Super Admin');

    //Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roles')->middleware('user_role:Super Admin');
    Route::match(['get','post'],'/add-role',[RoleController::class,'add'])->name('add_role')->middleware('user_role:Super Admin');
    Route::match(['get','post'],'/edit-role/{role_id}',[RoleController::class,'edit'])->name('edit_role')->middleware('user_role:Super Admin');
    
    Route::get('/logout',function(){
        
            auth()->logout();
        
        
        return redirect()->route('login');
    })->name('logout');
    
});

