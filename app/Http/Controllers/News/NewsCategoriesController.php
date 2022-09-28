<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    public function index(): string
    {
        $categories = NewsCategory::getCategories();
        return view('news.index')->with('news', $categories);
    }

    public function show($slug)
    {
        $categories = NewsCategory::getCategoriesBySlug($slug);
        if($categories == null)
        {
            return redirect('news.index');
        }

        $news = News::getByCategoriesId($categories['id']);
        if($news != null){
            return view('news.category')->with([
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return redirect('404');
    }
}
