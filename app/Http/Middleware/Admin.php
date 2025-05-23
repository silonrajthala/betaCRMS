<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            if (!$request->ajax()) 
            {
                $checkmenuaccess=checkmenupermission();
                if($checkmenuaccess < 1)
                {
                    return redirect('404');

                }

            }
            
            return $next($request);
        }

        return redirect('login');
    }
}
