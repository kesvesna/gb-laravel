<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for($i = 0; $i < 10; $i++)
        {
            DB::table('news')->insert([
                'id' => $i + 1,
                'category_id' => rand(1,5),
                'source_id' => rand(1,10),
                'image' => Str::random('15') . '.jpg',
                'title' => $faker->sentence('3', '10'),
                'is_private' => rand(0,1),
                'short_description' => $faker->text('50'),
                'description' => $faker->realText('500'),
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
