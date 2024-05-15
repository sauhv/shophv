<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert([
            ['category_name' => 'IPhone', 'slug'=>'iphone', 'rank' => 1, 'created_at' => now()],
            ['category_name' => 'IPad', 'slug'=>'ipad', 'rank' => 1, 'created_at' => now()],
            ['category_name' => 'Mac', 'slug'=>'mac', 'rank' => 1, 'created_at' => now()],
            ['category_name' => 'Watch', 'slug'=>'watch', 'rank' => 1, 'created_at' => now()],
            ['category_name' => 'Âm Thanh', 'slug'=>'am-thanh', 'rank' => 1, 'created_at' => now()],
            ['category_name' => 'Phụ Kiện', 'slug'=>'phu-kien', 'rank' => 1, 'created_at' => now()],
        ]);
    }
}
