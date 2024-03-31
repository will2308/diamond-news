<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class rd_logged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {

        if (Session()->has('loginid') && (url('login')===$req->url())) {
            return back();
        }
        return $next($req);
    }
}
