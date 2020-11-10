<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BlockSafety
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
        if($user->account_type == "safety"){
            flash("قسم الامن والسلامة مازال مغلق حتي الان")->error();
            return redirect()->route('profile');
        }
        return $next($request);
    }
}
