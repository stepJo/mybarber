<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLogMiddleware
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
        if(Session::has('logged_in')) {
            return redirect('admin/dashboard');
        }
        else {
            $response = $next($request);

            return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
        }
    }
}
