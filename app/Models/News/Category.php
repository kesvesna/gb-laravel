<?php

namespace App\Models\News;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Category
{
    public function getCategories()
    {
        return DB::table('news_categories')->get();
    }

    public function getCategoriesBySlug($slug)
    {
        return DB::table('news_categories')->where('slug', '=', $slug)->get();
    }

    public function getCategorySlugById($id): string
    {
        $category = DB::table('news_categories')->find($id);
        return $category->slug;
    }
}
