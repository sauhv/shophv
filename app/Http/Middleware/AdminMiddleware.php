<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Authl;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(\Auth::check())){
            if(\Auth::user()->role == 1) {
                return $next($request);
            }else {
                return redirect('admin');
            }
        }else {
            \Auth::logout();
            return redirect('admin');
        }
    }
}
