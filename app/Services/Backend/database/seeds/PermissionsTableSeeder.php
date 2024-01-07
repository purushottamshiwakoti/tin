<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 11:21 AM
 */

namespace App\Services\Backend\database\seeds;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $routes = [
            'users',
            'roles',
            'destinations',
            'activities',
            'regions',
            'trips',
            'sliders',
            'pages',
            'attachments',
            'menus',
            'settings',
            'ratings',
            'offers',
            'categories',
            'posts',
            'faqs',
            'subscribers',
            'faq-categories',
            'bookings',
            'flight-bookings',
            'fixed-departures',
            'customers',
            'landing-inquiry'
        ];

        $permissions = [];
        $permissions[] = ['name'=>'dashboard','guard_name'=>'web'];
        foreach ($routes as $route)
        {
            $permissions[] = ['name'=>$route.'.index','guard_name'=>'web'];
            $permissions[] = ['name'=>$route.'.show','guard_name'=>'web'];
            $permissions[] = ['name'=>$route.'.create','guard_name'=>'web'];
            $permissions[] = ['name'=>$route.'.edit','guard_name'=>'web'];
            $permissions[] = ['name'=>$route.'.destroy','guard_name'=>'web'];
        }

        Permission::insert($permissions);
        Permission::create(['name'=>'image.upload','guard_name'=>'web']);
    }
}