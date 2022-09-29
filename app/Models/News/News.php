<?php

namespace App\Models\News;

class News
{
    private Category $category;

    private array $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'Политические новости',
            'category_id' => 1,
            'isPrivate' => false
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Приватные новости науки и технологий',
            'category_id' => 2,
            'isPrivate' => true
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Спортивная приватная новость',
            'category_id' => 3,
            'isPrivate' => true
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Политические новости',
            'category_id' => 1,
            'isPrivate' => false
        ],
    ];

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoriesBySlug($slug);
        $news = [];
        foreach($this->getNews() as $item)
        {
            if($item['category_id'] == $id)
            {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNews(): array
    {
        return $this->news;
    }

    public function getNewsId($id): ?array
    {
        if(array_key_exists($id, $this->getNews()))
        {
            return $this->getNews()[$id];
        }
        return null;
    }

    public function getByCategoriesId($id): ?array
    {
        $news_with_one_category = [];
        foreach($this->getNews() as $news)
        {
            if($news['category_id'] == $id)
            {
                $news_with_one_category[] = $news;
            }
        }
        return $news_with_one_category;
    }

}
