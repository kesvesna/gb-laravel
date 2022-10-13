<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert([
            'id' => 1,
            'name' => 'Политика',
            'slug' => 'politic',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_categories')->insert([
            'id' => 2,
            'name' => 'Наука и технологии',
            'slug' => 'science&technology',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_categories')->insert([
            'id' => 3,
            'name' => 'Спорт',
            'slug' => 'sport',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_categories')->insert([
            'id' => 4,
            'name' => 'Культура',
            'slug' => 'culture',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_categories')->insert([
            'id' => 5,
            'name' => 'Интернет',
            'slug' => 'internet',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
