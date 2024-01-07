<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 11:50 AM
 */

namespace App\Services\Backend\database\seeds;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $permissions = Permission::all();
        $role = new Role();
        $role->fill(['name'=>'admin','guard_name'=>'web'])->save();
        $role->permissions()->sync($permissions);

    }
}