<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserTypeCheck
{

    public function handle($request, Closure $next)
    {
        $userType=Auth::user()->user_type;
        if($userType !== 'admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
