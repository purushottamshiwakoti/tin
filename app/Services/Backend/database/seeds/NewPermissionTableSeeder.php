<?php


namespace App\Services\Backend\database\seeds;


use App\Data\Models\Permission;
use Illuminate\Database\Seeder;

class NewPermissionTableSeeder extends Seeder
{

    public function run()
    {
        $routes = [
            // 'enquiries',
            // 'travelstyles',
            // 'teams',
            // 'testimonials',
            // 'searches'
            // 'hotels',
            // 'travelstyles',
            // 'teams',
        ];
        foreach ($routes as $route)
        {
            Permission::firstOrCreate(['name'=>$route.'.index','guard_name'=>'web']);
            Permission::firstOrCreate(['name'=>$route.'.show','guard_name'=>'web']);
            Permission::firstOrCreate(['name'=>$route.'.create','guard_name'=>'web']);
            Permission::firstOrCreate(['name'=>$route.'.edit','guard_name'=>'web']);
            Permission::firstOrCreate(['name'=>$route.'.destroy','guard_name'=>'web']);
        }

    }
}