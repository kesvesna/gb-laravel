<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;
use App\Models\News\NewsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Category $categories)
    {
        return view('news.index')->with('categories', $categories->getCategories());
    }

    public function show($category_slug, $id, Category $categories, News $news)
    {
        $categories = $categories->getCategoriesBySlug($category_slug);
        $news = $news->getNewsId($id);
        if($news != null && $categories != null){
            return view('news.one_new')->with([
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return redirect('errors/404');
    }

    public function export(News $news, Request $request)
    {
        if($request->input('category_id') != '0')
        {
            $news = $news->getByCategoriesId($request->input('category_id'));
        } else
        {
            $news = $news->getNews();
        }

        switch ($request->input('export_file_type'))
        {
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
}
