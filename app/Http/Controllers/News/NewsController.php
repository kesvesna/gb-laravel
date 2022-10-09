<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): string
    {
        $categories = NewsCategory::getCategories();
        return view('news.index')->with('categories', $categories);
    }

    public function show($category_slug, $id)
    {
        $categories = NewsCategory::getCategoriesBySlug($category_slug);
        $news = News::getNewsId($id);
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
