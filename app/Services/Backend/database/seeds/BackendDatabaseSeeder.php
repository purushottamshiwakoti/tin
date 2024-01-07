<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/10/18
 * Time: 11:30 AM
 */

namespace App\Services\Backend\database\seeds;

use Illuminate\Database\Seeder;

class BackendDatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UserTableSeeder::class);
    //    $this->call(PermissionsTableSeeder::class);
    //    $this->call(PermissionsTableSeeder::class);
        $this->call(NewPermissionTableSeeder::class);
    //    $this->call(RolesTableSeeder::class);
    //    $this->call(UserTableSeeder::class);
    //    $this->call(AdminMenuItemsSeeder::class);
    }
}