<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'adminproperty',
            'email' => 'adminproperty@gmail.com',
            'username' => 'adminproperty@2020',
            'password' => 'adminproperty@2020',
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'accountproperty',
            'email' => 'accountproperty@gmail.com',
            'username' => 'accountproperty@2020',
            'password' => 'accountproperty@2020',
            'role' => 'account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'agent',
            'email' => 'agentproperty@gmail.com',
            'username' => 'agentproperty@2020',
            'password' => 'agentproperty@2020',
            'role' => 'agent',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
