<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;

class NewsCategoriesController extends Controller
{
    public function index(Category $categories): string
    {
        return view('news.index')->with('news', $categories->getCategories());
    }

    public function show($slug, Category $categories, News $news)
    {
        $categories = $categories->getCategoriesBySlug($slug);
        if($categories == null)
        {
            return redirect('news.index');
        }
        $news = $news->getByCategoriesId($categories[0]->id);
        if($news != null){
            return view('news.category')->with([
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return redirect('404');
    }
}
