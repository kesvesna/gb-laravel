<?php

namespace App\Models\News;

class Category
{
    private array $categories = [
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
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCategoriesBySlug($slug): ?array
    {
        foreach($this->getCategories() as $categories){
            if($categories['slug'] == $slug){
                return $categories;
            }
        }
        return null;
    }

    public function getCategoryIdBySlug($slug): int
    {
        $id = null;
        foreach($this->getCategories() as $category)
        {
            if($category['slug'] == $slug)
            {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }
}
