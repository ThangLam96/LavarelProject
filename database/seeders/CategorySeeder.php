<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'name' => 'Menu',
            'parent_id' => 0,
            'link' => null,
            ],
            [
            'name' => 'Phone',
            'parent_id' => 1,
            'link' => null,
            ],
            [
            'name' => 'Iphone',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-apple-iphone',
            ],
            [
            'name' => 'Samsung',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-samsung',
            ],
            [
            'name' => 'Oppo',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-oppo',
            ],
            [
            'name' => 'Masstel',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-masstel',
            ],
            [
            'name' => 'Xiaomi',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-xiaomi',
            ],
            [
            'name' => 'Vivo',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-vivo',
            ],
            [
            'name' => 'Nokia',
            'parent_id' => 2,
            'link' => 'https://www.thegioididong.com/dtdd-nokia',
            ],
    ]);
    }
}
