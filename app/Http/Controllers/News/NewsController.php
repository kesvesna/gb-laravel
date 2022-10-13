<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;
use App\Models\News\NewsExport;
use App\Queries\NewsQueryBuilder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('categories', Category::all());
    }

    public function show($category_slug, $id)
    {

        $category = Category::where('slug', $category_slug)->first();
        $news = News::find($id);

        if ($news != null && $category != null) {
            return view('news.one_new')->with([
                'news' => $news,
                'categories' => $category
            ]);
        }
        return redirect('errors/404');
    }

    public function export(Request $request)
    {
        if ($request->input('category_id') != '0') {
            $news = News::where('category_id', $request->input('category_id'))->get();
        } else {
            $news = News::all();
        }

        switch ($request->input('export_file_type')) {
            case "pdf":
                return $this->pdf($news);
            case "json":
                return $this->json($news);
            default:
                return $this->excel();
        }
    }

    private function pdf($news) // если в шаблоне шрифт не Dejavu Sans, то в файле вместо букв будут одни знаки вопроса
    {
        $pdf = Pdf::loadView('news.pdf_invoice', compact('news'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');
    }

    private function excel() // сортировку по категориям новостей не осилил
    {
        return Excel::download(new NewsExport, 'news.xlsx');
    }

    private function json($news)
    {
        return $news;
    }

    //TODO public function create
    //TODO public function read
    //TODO public function update
    //TODO public function delete

    public function store(Request $request, NewsQueryBuilder $builder)
    {
        $news = $builder->create(
            $request->validated()
        );

        // if($builder->update($news, $request->validated())
        //{
        //return redirect()->route('admin.news.index')
        //                    ->with('success', __('messages.admin.news.update.success'));
        //}

        if ($news) {
            return redirect()->route('news')->with('success', __('messages.admin.news.create.success'));
        }

        return redirect()->route('admin.index')->with('error', __('messages.admin.news.create.fail'));
    }
}
