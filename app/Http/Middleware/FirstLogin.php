<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FirstLogin
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
        if(Auth::guard('web')->check()){
            $user = Auth::guard('web')->user();
            if($user->first_login == 1){
                return redirect()->route('profile')->with(['message'=>"من فضلك اكمل بياناتك", 'icon'=> 'info']);
            }else{
                return $next($request);
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
