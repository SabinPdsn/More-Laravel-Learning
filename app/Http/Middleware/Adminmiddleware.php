<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Adminmiddleware
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
    //    if(Auth::check()){
        $Auth_user = Auth::user();
        if($Auth_user->role==='admin'){
            return $next($request);
        }
    // }
        return response()->json([
            'error'=>'unauthorized access'
        ]);

    }
}
