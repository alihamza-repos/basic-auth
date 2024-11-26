<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SpecialUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            session()->flash('failed', 'Please Login First');
            return redirect('/login');
        } else{
            if(Auth::user()->role === 'admin'){
                session()->flash('success', 'Welcome! You are Admin');
                return $next($request);
            }
            else{

                return redirect('/profile')->with('failed', 'Check email. You do not have Special Users email');
            }
        }

    }
}
