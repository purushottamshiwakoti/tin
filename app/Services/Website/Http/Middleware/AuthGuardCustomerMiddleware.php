<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 3:56 PM
 */

namespace App\Services\Website\Http\Middleware;


use Illuminate\Support\Facades\Config;

class AuthGuardCustomerMiddleware
{

    public function handle($request, \Closure $next,$guard = null)
    {
        Config::set('auth.defaults.guard', 'customer');

        return $next($request);
    }
}