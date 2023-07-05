<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerfiyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if(!Auth::check()){
               throw new Exception('Please login to continue.');
            }
            if(Auth::user()->is_bloked=='yes'){
              throw new Exception('Please contact admin,You account is blocke for some reason'); 
            }
            return $next($request);
          
        } catch (Exception $ex) {
            return redirect()->route('user.login')->with('warning',$ex->getMessage());
        }
       
    }
}
