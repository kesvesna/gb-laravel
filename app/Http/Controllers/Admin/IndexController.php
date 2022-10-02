<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function test1()
    {
        return response()->download('1.jpg');
    }

    public function test2(News $news)
    {
        return response()
            ->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename="json.txt"', )
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function create(Request $request, Category $categories, News $news)
    {
        if($request->isMethod(('post')))
        {
            $news = $news->getNews();

            $news[] = $request->except('_token');
            $lastKey = array_key_last($news);
            $news[$lastKey]['id'] = $lastKey;

            if(!array_key_exists('isPrivate', $news))
            {
                $news[$lastKey]['isPrivate'] = false;
            }

            Storage::disk('local')
                ->put('news.json', json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

            $path = 'news/' .  $categories->getCategorySlugById($news[$lastKey]['category_id']) . '/' . $lastKey;

            return redirect($path);
        }
        return view('admin.create', [
            'categories' => $categories->getCategories()
        ]);
    }
}
