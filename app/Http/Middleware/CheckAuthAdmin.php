<?php

namespace App\Http\Middleware;

use App\Enums\Constant;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthAdmin
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
        if (Auth::check() && Auth::user()->role === Constant::ROLE_USER['ADMIN']) {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
