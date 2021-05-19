<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth ;
use Closure;
use Illuminate\Http\Request;

class adminRole
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
        if(Auth::user()->role_id == 'admin'){
            return $next($request); }
            return redirect()->to(route('home'));
    } 
}
