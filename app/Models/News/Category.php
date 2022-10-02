<?php

namespace App\Models\News;

use Illuminate\Support\Facades\Storage;

class Category
{
    public function getCategories(): array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
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

    public function getCategorySlugById($id): string
    {
        $slug = null;
        foreach($this->getCategories() as $category)
        {
            if($category['id'] == $id)
            {
                $slug = $category['slug'];
                break;
            }
        }
        return $slug;
    }
}
