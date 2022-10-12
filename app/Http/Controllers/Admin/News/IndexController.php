<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News\Category;
use App\Models\News\CategoryQueryBuilder;
use App\Models\News\News;
use App\Models\News\NewsQueryBuilder;
use App\Models\News\Source;
use App\Models\News\SourceQueryBuilder;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(NewsQueryBuilder $news_builder, CategoryQueryBuilder $categories_builder)
    {
        return view('admin.news.index', [
            'news' => $news_builder->getAllNews(5),
            'categories' => $categories_builder->getCategories()
        ]);
    }

    public function create(NewsQueryBuilder $news_builder, CategoryQueryBuilder $category_builder, SourceQueryBuilder $source_builder, $new_id = null)
    {
        return view('admin.news.create', [
            'new' => $news_builder->getNewsById($new_id),
            'categories' => $category_builder->getCategories(),
            'sources' => $source_builder->getSources()
        ]);
    }

    public function view(NewsQueryBuilder $builder, $id)
    {
        return view('admin.news.view', [
            'new' => $builder->getNewsById($id)
        ]);
    }

    /**
     * @param CreateRequest $request
     * @param $new_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request, NewsQueryBuilder $builder, $new_id = null)
    {
        if ($request->isMethod(('post'))) {

            $news = $builder->getNewsById($new_id);

            if (is_null($new_id)) {
                $news = $builder->create($request->validated());
            } else
            {
                $news->fill($request->validated());
            }

            if (!is_null($request->input('is_private'))) {
                $news->is_private = true;
            }

            if ($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $news->image = Storage::url($path);
            }

            if ($news->save()) {
                return \redirect()
                    ->route('admin.news.view', ['id' => $news->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete($id = null): JsonResponse
    {
        try {
                $deleted = News::find($id)->delete();
                if($deleted)
                {
                    return \response()->json('ok', 200);
                }
                return \response()->json('error', 400);
        } catch (\Exception $e)
        {
            Log::error('New with ID: ' . $id . ' delete error');
            //Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
    }
}
