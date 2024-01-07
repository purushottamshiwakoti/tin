<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/17/18
 * Time: 11:57 AM
 */

namespace App\Services\Website\Http\Middleware;


use Illuminate\Support\Facades\Auth;

class CustomerAuthMiddleware
{

    public function handle($request, \Closure $next, $guard = null)
    {
        if(!Auth::check())
        {
            return redirect('/')->with(['message'=>'Unauthorized!','alert-type'=>'error']);
        }

        if($request->user && $request->user!=Auth::user()->id)
        {
            return redirect('/')->with(['message'=>'Unauthorized!','alert-type'=>'error']);
        }

        return $next($request);
    }
}