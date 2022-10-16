<?php

namespace Tests\Browser\Admin\News;

use App\Models\News\Source;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SourceTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_add_source_page(): void
    {
        $source = Source::factory()->create();

        $this->browse(function ($browser) use ($source) {
            $browser->visit('/admin/news/sources/create')
                ->type('name', $source->name)
                ->type('slug', $source->slug)
                ->press('Сохранить')
                ->assertPathIs('/admin/news/sources/store');
        });
    }

    public function test_visit_sources_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/sources')
                ->assertSee('Админка источников новостей');
        });
    }
}
