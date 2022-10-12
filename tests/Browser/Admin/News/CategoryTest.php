<?php

namespace Tests\Browser\Admin\News;

use App\Models\News\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_basic_example(): void
    {
        $category = Category::factory()->create();

        $this->browse(function ($browser) use ($category) {
            $browser->visit('/admin/news/categories')
                ->type('name', $category->name)
                ->type('slug', $category->slug)
                ->press('Сохранить')
                ->assertPathIs('/admin/news/category/');
        });
    }
}
