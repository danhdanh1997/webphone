<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vp_user')->insert([
        	'name' => 'admin3',
        	'email' => 'xuandanh04@gmail.com',
        	'password' => Hash::make('admin3'),
            'role' => 1,
            'provider'=>993266291058068,
            'provider_id'=>993266291058068
        ]);
    }
}
