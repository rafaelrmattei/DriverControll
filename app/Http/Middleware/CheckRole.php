<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();

        if($user->isAdmin()){
            return $next($request);
        }
        
        return redirect()->route('logout');

    }

}
