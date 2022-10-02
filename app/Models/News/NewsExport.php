<?php

namespace App\Models\News;

use Maatwebsite\Excel\Concerns\FromCollection;
use Barryvdh\DomPDF\Facade\Pdf;

class NewsExport implements FromCollection
{
    public function collection() // правильность реализации под вопросом, вывод новостей в файл работает
    {
        $category = new Category();
        $news = new News($category);
        return collect($news->getNews());
    }
}
