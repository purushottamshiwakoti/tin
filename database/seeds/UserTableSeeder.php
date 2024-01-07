<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Data\User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Data\User::insert([
            'name'=>'Nbin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password')
        ]);
    }
}
