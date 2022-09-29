<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;

class NewsController extends Controller
{
    public function index(Category $categories): string
    {
        return view('news.index')->with('categories', $categories->getCategories());
    }

    public function show($category_slug, $id, Category $categories, News $news)
    {
        $categories = $categories->getCategoriesBySlug($category_slug);
        $news = $news->getNewsId($id);
        if($news != null && $categories != null){
            return view('news.one_new')->with([
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return redirect('errors/404');
    }

    public function add(): string
    {
        return view('news.add');
    }
}
