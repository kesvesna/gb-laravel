<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if(is_null($id))
        {
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

    public function store(Request $request, $new_id = null)
    {
        if($request->isMethod(('post')))
        {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:255'],
                'description' => ['required', 'min:5'],
                'short_description' => ['required', 'min:5']
            ]);

            $news = News::find($new_id);

            if(!$news)
            {
                $news = new News();
            }

            $news->title = $request->input('title');
            $news->description = $request->input('description');
            $news->short_description = $request->input('short_description');
            $news->category_id = $request->input('category_id');
            $news->source_id = $request->input('source_id');;

            if(is_null($request->input('is_private')))
            {
                $news->is_private = false;
            } else
            {
                $news->is_private = true;
            }

            if($request->hasFile('image'))
            {
                $path = Storage::putFile('public', $request->file('image'));
                $news->image = Storage::url($path);
            }

            if($news->save())
            {
                return \redirect()
                    ->route('admin.news.view', [ 'id' => $news->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete($id = null)
    {
        if(!is_null($id))
        {
            News::find($id)->delete();
        }

        return redirect()->route('admin.news.index', [
            'news' => News::query()->with('category')->paginate(5),
            'categories' => Category::all()
        ]);
    }
}
