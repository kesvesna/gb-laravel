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

    public function view(SourceQueryBuilder $builder, $id)
    {
        return view('admin.news.sources.view', [
            'source' => $builder->getSourceById($id)
        ]);
    }

    public function store(CreateSourceRequest $request, SourceQueryBuilder $builder, $source_id = null)
    {
        if ($request->isMethod(('post'))) {

            if (is_null($source_id)) {
                $source = $builder->create($request->validated());
            } else {
                $source = $builder->getSourceById($source_id);
                $source = $source->fill($request->validated());
            }

            if ($source->save()) {
                return \redirect()
                    ->route('admin.news.sources.view', ['id' => $source->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete(SourceQueryBuilder $builder, $id = null)
    {
        if (!is_null($id)) {
            $builder->delete($id);
        }

        return redirect()->route('admin.news.sources.index', [
            'sources' => $builder->getSources(),
        ]);
    }
}
