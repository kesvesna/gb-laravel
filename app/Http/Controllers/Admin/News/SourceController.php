<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        return view('admin.news.sources.index', [
            'sources' => Source::all()
        ]);
    }

    public function create($id = null)
    {
        if (!is_null($id)) {
            return view('admin.news.sources.create', [
                'source' => Source::find($id)
            ]);
        }
        return view('admin.news.sources.create', [
            'source' => new Source()
        ]);
    }

    public function view($id)
    {
        return view('admin.news.sources.view', [
            'source' => Source::find($id)
        ]);
    }

    public function store(Request $request, $source_id = null)
    {
        if ($request->isMethod(('post'))) {
            $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'slug' => ['required', 'string', 'min:3', 'max:50']
            ]);

            $source = Source::find($source_id);

            if (!$source) {
                $source = new Source();
            }

            $source->name = $request->input('name');
            $source->slug = $request->input('slug');


            if ($source->save()) {
                return \redirect()
                    ->route('admin.news.sources.view', ['id' => $source->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            Source::find($id)->delete();
        }

        return redirect()->route('admin.news.sources.index', [
            'sources' => Source::all()
        ]);
    }
}
