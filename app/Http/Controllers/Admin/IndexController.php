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
            ->header('Content-Disposition', 'attachment; filename="json.txt"',)
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function create(Request $request, Category $categories)
    {
        if ($request->isMethod(('post'))) {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:255'],
                'description' => ['required', 'min:5']
            ]);
            //$data = $request->only(['category_id', 'title', 'is_private', 'description']);
            $news = new News();
            $news->title = $request->input('title');
            $news->description = $request->input('description');
            $news->short_description = $news->description;
            $news->category_id = $request->input('category_id');
            $news->source_id = 2;

            if (is_null($request->input('is_private'))) {
                $news->is_private = false;
            } else {
                $news->is_private = true;
            }

            if (is_null($request->input('image'))) {
                $news->image = '';
            }

            // get image from request
            // if($request->hasFile('image')
            //{
            //    $path = Storage::putFile('public', $request->file('image'));
            //    $news['image'] = Storage::url($path);
            //}

            if ($news->save()) {
                $category_slug = $categories->getCategorySlugById($news->category_id);
                return \redirect()
                    ->route('news.one', ['categories' => $category_slug, 'id' => $news->id])
                    ->with('success', 'Запись добавлена');
            }
            return back()->with('error', 'Не удалось добавить запись');
        }

        return view('admin.create', [
            'categories' => $categories->getCategories()
        ]);
    }
}
