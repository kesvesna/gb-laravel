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
            'news' => News::paginate(config('admin.applications.pagination')),
            'categories' => $categories_builder->getCategories()
        ]);
    }

    public function create(
        NewsQueryBuilder     $news_builder,
        CategoryQueryBuilder $category_builder,
        SourceQueryBuilder   $source_builder,
        News                 $news,
                             $new_id = null
    )
    {

        return view('admin.news.create', [
            'new' => $new_id ? $news_builder->getNewsById($new_id) : $news,
            'categories' => $category_builder->getCategories(),
            'sources' => $source_builder->getSources()
        ]);
    }

    /**
     * @param CreateRequest $request
     * @param $new_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request, NewsQueryBuilder $builder, News $news, $new_id = null)
    {
        if ($request->isMethod(('post'))) {

            if (is_null($new_id)) {
                $news = $builder->create($request->validated() + ['guid' => $request->input('link')]);
            } else {
                $news = $builder->getNewsById($new_id);
                $news->fill($request->validated() + ['is_private' => $request->input('is_private')]);
            }

            if ($news->save()) {
                return \redirect()
                    ->route('admin.news.show', $news->id)
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function show(News $news)
    {
        return view('admin.news.show', [
            'new' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'new' => $news
        ]);
    }


    public function update(News $news, Request $request)
    {
        $data = $request->validate([
            'trk_id' => 'required',
            'comment' => 'string',
        ]);
        $news->update($data);
        return redirect()->route('admin.news.show', $news->id);
    }


    public function destroy($id = null): JsonResponse
    {
        try {
            $deleted = News::findOrFail($id)->delete();
            if ($deleted) {
                return \response()->json('ok', 200);
            }
            return \response()->json('error', 400);
        } catch (\Exception $e) {
            Log::error('New with ID: ' . $id . ' delete error');
            //Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
    }
}

