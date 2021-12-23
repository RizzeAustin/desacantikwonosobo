<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = $request->user()->role;
        $checkRole = 0;
        if($userRole =='admin' || $userRole =='editor')
        {
            $checkRole = 1;
        }
        
        if($checkRole == 1)
            return $next($request);
        else
           return abort(401);
    }
}
