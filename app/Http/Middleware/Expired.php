<?php

namespace App\Http\Middleware;

use App\Notifications\ExpiredNotification;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class Expired
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
        if($user->expired_at->subDays(10) < Carbon::now() && $user->expired_at >= Carbon::now()){
            $lastOne = $user->notifications()->where('type', 'App\Notifications\ExpiredNotification')->latest()->first();
            if($lastOne){
                $diff =$lastOne->created_at->diff(Carbon::now());
                if($diff->days == 0){
                    return $next($request);
                }
            }
            $user->notify(new ExpiredNotification());
        }
        return $next($request);
    }
}
