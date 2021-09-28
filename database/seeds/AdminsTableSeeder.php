<?php

use App\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
 
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        Admin::create([
            'name'      =>  'Moumita',
            'email'     =>  'admin@admin.com',
            'role_id'     =>  1,

            'password'  =>  bcrypt('password'),
        ]);
    }
}
