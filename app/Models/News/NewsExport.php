<?php

namespace App\Models\News;

use Maatwebsite\Excel\Concerns\FromCollection;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromCollection, WithHeadings
{
    public function collection() // правильность реализации под вопросом, вывод новостей в файл работает
    {
        $category = new Category();
        $news = new News($category);
        return collect($news->getNews());
    }

    public function headings(): array
    {
        return [
            'ID',
            'Заголовок',
            'Текст',
            'ID Категории',
            'Новость приватная'
        ];
    }
}
