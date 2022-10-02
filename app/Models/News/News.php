<?php

namespace App\Models\News;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;

class News
{
    private Category $category;

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
        return json_decode(Storage::disk('local')->get('news.json'), true);
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
