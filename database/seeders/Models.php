<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class models extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('models')->insert([
            ['model_name' => '15 Series','slug' => '15-series' , 'category_id' => 1, 'created_at' => now()],
            ['model_name' => '14 Series','slug' => '14-series' , 'category_id' => 1, 'created_at' => now()],
            ['model_name' => '13 Series','slug' => '13-series' , 'category_id' => 1, 'created_at' => now()],
            ['model_name' => '12 Series','slug' => '12-series' , 'category_id' => 1, 'created_at' => now()],
            ['model_name' => '11 Series','slug' => '11-series' , 'category_id' => 1, 'created_at' => now()],

            ['model_name' => 'IPad Pro M1','slug' => 'ipad-pro-m1' , 'category_ id' => 2, 'created_at' => now()],
            ['model_name' => 'IPad Pro M2','slug' => 'ipad-pro-m2' , 'category_id' => 2, 'created_at' => now()],
            ['model_name' => 'IPad Air','slug' => 'ipad-air' , 'category_id' => 2, 'created_at' => now()],
            ['model_name' => 'IPad 9','slug' => 'ipad-9' , 'category_id' => 2, 'created_at' => now()],
            ['model_name' => 'IPad 10','slug' => 'ipad-10' , 'category_id' => 2, 'created_at' => now()],
            ['model_name' => 'IPad Mini','slug' => 'ipad-mini' , 'category_id' => 2, 'created_at' => now()],

            ['model_name' => 'MacBook Pro M2','slug' => 'macbook-pro-m2' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Pro M3','slug' => 'macbook-pro-m3' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Air','slug' => 'macbook-air' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Imac','slug' => 'macbook-imac' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Mini','slug' => 'macbook-mini' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Pro','slug' => 'macbook-pro' , 'category_id' => 3, 'created_at' => now()],
            ['model_name' => 'MacBook Studio','slug' => 'macbook-studio' , 'category_id' => 3, 'created_at' => now()],

            ['model_name' => 'Apple Watch Ultra 2','slug' => 'apple-watch-ultra-2' , 'category_id' => 4, 'created_at' => now()],
            ['model_name' => 'Apple Watch SE','slug' => 'apple-watch-se' , 'category_id' => 4, 'created_at' => now()],
            ['model_name' => 'Apple Watch Series 8','slug' => 'apple-watch-series-8' , 'category_id' => 4, 'created_at' => now()],
            ['model_name' => 'Apple Watch Series 7','slug' => 'apple-watch-series-7' , 'category_id' => 4, 'created_at' => now()],
            ['model_name' => 'Apple Watch Series 6','slug' => 'apple-watch-series-6' , 'category_id' => 4, 'created_at' => now()],
            ['model_name' => 'Apple Watch Series 3','slug' => 'apple-watch-series-3' , 'category_id' => 4, 'created_at' => now()],

            ['model_name' => 'Marshall','slug' => 'marshall' , 'category_id' => 5, 'created_at' => now()],
            ['model_name' => 'Apple Sound','slug' => 'apple-sound' , 'category_id' => 5, 'created_at' => now()],
            ['model_name' => 'AirPods','slug' => 'airpods' , 'category_id' => 5, 'created_at' => now()],

            ['model_name' => 'Ốp lưng','slug' => 'op-lung' , 'category_id' => 6, 'created_at' => now()],
            ['model_name' => 'Kính cường lực','slug' => 'kinh-cuong-luc' , 'category_id' => 6, 'created_at' => now()],
        ]);
    }
}
