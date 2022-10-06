<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public function getNews()
    {
        return DB::table('news')->get();
    }

    public function getNewsId($id)
    {
        return DB::table('news')->find($id);
    }

    public function getByCategoriesId($id)
    {
        return DB::table('news')->where('category_id', '=', $id)->get();
    }

}
