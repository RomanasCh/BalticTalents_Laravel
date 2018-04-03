<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CheckLanguage
{

    public function handle($request, Closure $next)
    {
        if(Session::has('language')) {
            App::setLocale(Session::get('language'));
        }
        return $next($request);
    }
}
