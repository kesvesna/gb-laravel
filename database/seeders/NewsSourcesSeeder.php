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
            'name' => 'https://news.rambler.ru/rss/tech',
            'slug' => 'tech',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 2,
            'name' => 'https://news.rambler.ru/rss/moscow_city',
            'slug' => 'moscow_city',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 3,
            'name' => 'https://news.rambler.ru/rss/holiday',
            'slug' => 'holiday',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 4,
            'name' => 'https://news.rambler.ru/rss/technology',
            'slug' => 'technology',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('news_sources')->insert([
            'id' => 5,
            'name' => 'https://news.rambler.ru/rss/gifts',
            'slug' => 'gifts',
            'deleted_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
