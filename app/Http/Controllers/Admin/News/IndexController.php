<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\NewsQueryBuilder;
use App\Models\News\Source;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::query()->with('category')->paginate(5),
            'categories' => Category::all()
        ]);
    }

    public function create($id = null)
    {
        if (is_null($id)) {
            return view('admin.news.create', [
                'categories' => Category::all(),
                'sources' => Source::all(),
                'new' => new News
            ]);
        }
        return view('admin.news.create', [
            'categories' => Category::all(),
            'sources' => Source::all(),
            'new' => News::find($id)
        ]);
    }

    public function view($id)
    {
        return view('admin.news.view', [
            'new' => News::find($id)
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

            $news = News::find($new_id);

            if (!$news) {
                $news = $builder->create($request->validated());
            }

            if (is_null($request->input('is_private'))) {
                $news->is_private = false;
            } else {
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
