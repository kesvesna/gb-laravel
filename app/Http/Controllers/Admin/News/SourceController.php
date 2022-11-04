<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Sources\CreateSourceRequest;
use App\Models\News\Source;
use App\Models\News\SourceQueryBuilder;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index(SourceQueryBuilder $builder)
    {
        return view('admin.news.sources.index', [
            'sources' => $builder->getSources(),
        ]);
    }

    public function create(SourceQueryBuilder $builder, $id = null)
    {
        if (!is_null($id)) {
            return view('admin.news.sources.create', [
                'source' => $builder->getSourceById($id),
            ]);
        }
        return view('admin.news.sources.create', [
            'source' => new Source()
        ]);
    }

    public function show(Source $source)
    {
        return view('admin.news.sources.show', [
            'source' => $source
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
        ]);

        if (Source::create($data)) {
            return redirect()->route('admin.news.sources.index')->with('success', 'Запись добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function destroy(Source $source)
    {
        $source->delete();
        return redirect()->route('admin.news.sources.index');
    }

    public function update(Source $source, Request $request)
    {
        $data = $request->validate([
            'name' => 'string',
            'slug' => ''
        ]);

        $source->update($data);
        return redirect()->route('admin.news.sources.show', $source->id);
    }

    public function edit(Source $source)
    {
        return view('admin.news.sources.edit', [
            'source' => $source
        ]);
    }
}
