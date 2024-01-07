<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 12:11 PM
 */

namespace App\Services\Backend\Http\Middleware;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Support\Str;

class UserPermissionsMiddleware
{

    public function handle($request, \Closure $next, $guard = null)
    {

        if (app('auth')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

//        $routePrefix = $request->route()->getPrefix();
        $routeName = $request->route()->getName();
        if(Str::contains($routeName,'menu-items'))
        {
            $routeName = Str::replace('.menu-items.','.',$routeName);
        }
        $permission = Str::after($routeName,'admin.');
        $groups = [
            [   'group'=>'edit',
                'permissions'=>'update|order|cancel'
            ],
            [   'group'=>'create',
                'permissions'=>'store'
            ],
            [   'group'=>'index',
                'permissions'=>'get-data'
            ],
        ];


        $nP = substr(strrchr($permission, '.'), 1)?:$permission;
        $key = Arr::where(array_column($groups, 'permissions'),function($k,$v) use ($nP){
            return Str::contains($k,$nP);
        });
//        $key = array_search(Str::after($permission,'.'), array_column($groups, 'permissions'));

        if(count($key)>0)
        {
            $permission = Str::before($permission,'.').'.'.$groups[key($key)]['group'];
        }
// dd($permission);
        if (app('auth')->user()->hasPermissionTo($permission)) {
            return $next($request);
        }
//
        throw UnauthorizedException::forPermissions([$permission]);
    }
}