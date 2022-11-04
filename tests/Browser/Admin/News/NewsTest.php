<?php

namespace Tests\Browser\Admin\News;

use App\Models\News\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_add_news_page(): void
    {
        $news = News::factory()->create();

        $this->browse(function ($browser) use ($news) {
            $browser->visit('/admin/news/create')
                ->select('category_id', $news->category_id)
                ->select('source_id', $news->source_id)
                ->type('title', $news->title)
                ->type('short_description', $news->short_description)
                ->type('description', $news->description)
                //->attach('image', '')
                //->checkbox('is_private', 'true')
                ->press('Сохранить')
                ->assertPathIs('/admin/news/view/' . $news->id + 1);
        });
    }

    public function test_visit_news_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news')
                ->assertSee('Админка новостей');
        });
    }
}
