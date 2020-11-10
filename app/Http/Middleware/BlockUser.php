<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class BlockUser
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
        $user = Auth::guard('web')->user();
        if($user->expired_at < Carbon::now()){
            flash("تم انتهاء فترة السماح المخصصة  لك")->error();
            return redirect()->route('profile');
        }
        return $next($request);
    }
}
