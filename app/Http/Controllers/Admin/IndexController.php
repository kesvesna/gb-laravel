<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function create(Request $request, Category $categories)
    {
        if($request->isMethod(('post')))
        {
            $news[] = $request->except('_token');
            $news[0]['source_id'] = 2;
            $news[0]['image'] = '';
            $news[0]['short_description'] = $news[0]['description'];
            $news[0]['created_at'] = now();
            $news[0]['updated_at'] = now();
            $news[0]['deleted_at'] = null;

            if(!array_key_exists('is_private', $news[0]))
            {
                $news[0]['is_private'] = false;
            }

            $id = DB::table('news')->insertGetId($news[0]);

            // get image from request
            // if($request->hasFile('image')
            //{
            //    $path = Storage::putFile('public', $request->file('image'));
            //    $news['image'] = Storage::url($path);
            //}

            $category_slug = $categories->getCategorySlugById($news[0]['category_id']);
            return redirect()->route('news.one', [ 'category' => $category_slug, 'id' => $id]);
        }

        return view('admin.create', [
            'categories' => $categories->getCategories()
        ]);
    }
}
