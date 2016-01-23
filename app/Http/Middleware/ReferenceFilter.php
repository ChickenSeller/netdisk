<?php

namespace App\Http\Middleware;

use App\Config;
use App\Http\Controllers\LogController;
use Closure;

class ReferenceFilter
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
        $domain = Config::whereKey('domain')->whereApplied(true)->first();
        if($domain == null){
            return $next($request);
        }
        if($request->header('Referer')==""){
            LogController::LogLeech($request->fullUrl());
            die("禁止盗链1");
        }
        $referer = parse_url($request->header('Referer'));
        if($referer['host']!=$domain->value){
            LogController::LogLeech($request->fullUrl());
            die("禁止盗链2");
        }
        return $next($request);
    }
}
