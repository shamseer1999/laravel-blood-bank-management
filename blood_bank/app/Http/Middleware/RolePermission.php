<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if(auth()->check())
        {

            $role_id=auth()->user()->role_id;
            $role_array=Role::where('id',$role_id)->get()->pluck('role_name')->toArray();

            if(in_array($role,$role_array))
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('dashbord');
            }
        }
        else
        {
            return redirect()->route('login');
        }
        
    }
}
