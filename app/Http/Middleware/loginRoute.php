<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginRoute
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
            return redirect()->to(route('dashboard.main'));
        }elseif(Auth::user()->role_id == 'doctor'){
            return redirect()->to(route('teach.main'));
        }else{
            return redirect()->to(route('stud.index'));
        }
        return $next($request);
    }
}
