<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreatePhoneMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() == null ) {
            return redirect('/login')->with('status', 'Kamu Belum login!!');
        } else if (Auth::user()->roles != 'Admin') {
            return redirect(route('rumah'))->with('status', 'Kamu Bukan Admin!!');
        }
        return $next($request);
    
       
    }
}
