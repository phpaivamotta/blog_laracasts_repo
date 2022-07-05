<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check to see if a guest (someone who is not signed in) is trying enter admin page
        // if so, abort with 403
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $admins = ['jessicaszklarz'];
                                   
        $userIsAdmin = in_array(auth()->user()->username, $admins);

        if(!$userIsAdmin){
            abort(Response::HTTP_FORBIDDEN);
        }
        
        return $next($request);
    }
}
