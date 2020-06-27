<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if(auth()->guard('admin')->user() == null){
            alert('','غير مصرح لك بالدخول','error');
            return Redirect::back();
        }else{
            $admin = auth()->guard('admin')->user();
            $permissions = $admin->permissions;
            if($permissions[$permission]){
                return $next($request);
            }else{
                alert('','غير مصرح لك بالدخول','error');
                return Redirect::back();
            }
        }
    }
}
