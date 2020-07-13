<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;

class IsOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Setting::first()->is_closed){
            return $next($request);
        }else{
            return redirect()->route('isClosed');
        }
    }
}
