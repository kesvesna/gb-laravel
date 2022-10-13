<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\News\Category;
use App\Models\News\News;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_a_news_view_can_be_rendered_and_we_can_see_all_categories()
    {
        $categories = new Category();
        $categories = $categories->getCategories();

        $view = $this->view('news.index', ['categories' => $categories]);

        $view->assertSeeInOrder(['Политика', 'Наука и технологии', 'Спорт']);
    }

    public function test_page_for_new_with_id_1()
    {
        $categories = new Category();

        $news = new News($categories);
        $news = $news->getNews()[1];

        $categories = $categories->getCategoriesBySlug('politic');

        $view = $this->view('news.one_new', ['news' => $news, 'categories' => $categories]);

        $view->assertSeeInOrder(['Новости: Политика', 'Новость 1', 'Политические новости']);
    }

    public function test_routing() // не отлавливает неправильный роут, т.к. нет явной обработки ошибки 404
    {
        $response = $this->get('/admin/ggggggggggggggggggggggggg');

        $response->assertStatus(200);
    }
}
