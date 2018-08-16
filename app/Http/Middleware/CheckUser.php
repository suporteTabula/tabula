<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
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
        $user = Auth::user();

        if($user)
        {
            if ($user->userGroups()->first()) {
                return redirect('userGroupHome');
            }

            return $next($request);
        }

        return $next($request);
    }
}
