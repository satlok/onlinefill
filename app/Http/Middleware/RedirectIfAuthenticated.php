<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
     protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
        case 'admin':
            $link='/admin';
            break;
        default: 
            //new code
            if(Auth::user()){
            if($this->auth->user()->role == 'Learner'){
            $link= '/home';
            }
            if($this->auth->user()->role == 'Trainer'){
                $link= '/trainer';
            }
            if($this->auth->user()->role == ''){
                $link= '/trainer';
            }
            }else{
                $link= '/notFound';
            }
            //new code
           // $link= '/home';
            break;
        }
        if (Auth::guard($guard)->check()) {
            return redirect($link);
        }

        return $next($request);
    }
}
