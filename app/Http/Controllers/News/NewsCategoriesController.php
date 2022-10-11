<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;

class NewsCategoriesController extends Controller
{

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category == null) {
            return redirect()->route('news.index');
        }

        $news = News::where('category_id', $category->id)->get();

        if ($news != null) {
            return view('news.category')->with([
                'news' => $news,
                'categories' => $category
            ]);
        }

        return redirect()->route('404');
    }
}
