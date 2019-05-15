<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //this method will be triggered before your controller constructor
    protected $auth;
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        //check here if the user is authenticated
        if ( ! $this->auth->user() )
        {
            // here you should redirect to login 
            // return view('logeo');
            return redirect('/login');
        }

        return $next($request);
    }
}

