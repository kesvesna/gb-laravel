<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_sources')->insert([
            'id' => 1,
            'name' => 'Телеграмм',
            'slug' => 'telegram',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 2,
            'name' => 'Вконтакте',
            'slug' => 'vk',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 3,
            'name' => 'Нью-Йорк Таймс',
            'slug' => 'new_york_times',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 4,
            'name' => 'Washington post',
            'slug' => 'washington_post',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 5,
            'name' => 'Новости науки для студентов',
            'slug' => 'science_news_for_students',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 6,
            'name' => 'RT',
            'slug' => 'rt',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 7,
            'name' => 'РБК',
            'slug' => 'rbk',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 8,
            'name' => 'Дождь',
            'slug' => 'dozhd',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 9,
            'name' => 'Moscow City Journal',
            'slug' => 'moscow_city_journal',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 10,
            'name' => 'Аргументы и факты',
            'slug' => 'arguments_and_facts',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
