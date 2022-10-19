<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\News::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Kesvesna',
             'email' => 'kesvesna@rambler.ru',
             'password' => Hash::make('12345678'),
             'is_admin' => true,
         ]);

        $this->call([
            //NewsSeeder::class
        ]);
    }
}
