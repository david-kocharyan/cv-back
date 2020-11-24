<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;

class CheckUserHas
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
        $user = User::first();
        if ($user != null){
            abort(404);
        }
        return $next($request);
    }
}
