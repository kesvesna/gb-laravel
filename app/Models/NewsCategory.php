<?php

namespace App\Models;

class NewsCategory
{
    private static array $categories = [
        [
            'id' => 1,
            'name' => 'Политика',
            'slug' => 'politic'
        ],
        [
            'id' => 2,
            'name' => 'Наука и технологии',
            'slug' => 'science&technology'
        ],
        [
            'id' => 3,
            'name' => 'Спорт',
            'slug' => 'sport'
        ],
    ];
    public static function getCategories(): array
    {
        return static::$categories;
    }

    public static function getCategoriesBySlug($slug): ?array
    {
        foreach(static::getCategories() as $categories){
            if($categories['slug'] == $slug){
                return $categories;
            }
        }
        return null;
    }
}
