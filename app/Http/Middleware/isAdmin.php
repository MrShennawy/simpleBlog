<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if(\Auth::check()){
            if(\Auth::user()->isAdmin){
                return $next($request);
            }
            \Session::flash('flash_error','Sorry you don\'t have permission to access this page');
            return redirect('/');
        }
        \Session::flash('flash_error','Sorry you don\'t have permission to access this page');
        return redirect('/');
    }
}
