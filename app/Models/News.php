<?php

namespace App\Models;

class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'Политические новости',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Новости науки и технологий',
            'category_id' => 2
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Спортивная новость',
            'category_id' => 3
        ],
        [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Политические новости',
            'category_id' => 1
        ],
    ];

    public static function getNews(): array
    {
        return static::$news;
    }

    public static function getNewsId($id): ?array
    {
        foreach(static::getNews() as $news){
            if($news['id'] == $id){
                return $news;
            }
        }
        return null;
    }

    public static function getByCategoriesId($id): ?array
    {
        $news_with_one_category = [];
        foreach(static::getNews() as $news)
        {
            if($news['category_id'] == $id)
            {
                $news_with_one_category[] = $news;
            }
        }
        return $news_with_one_category;
    }

}
