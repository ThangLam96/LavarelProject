<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'green@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'greenacademy',
            'phone' => '0901234561',
            'level' => 1,
            'avatar' => 'admin.jpg'
        ]);
    }
}
