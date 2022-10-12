<?php

namespace App\Models\News;

use Maatwebsite\Excel\Concerns\FromCollection;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromCollection, WithHeadings
{
    public function collection() // правильность реализации под вопросом, вывод новостей в файл работает
    {
        return News::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID категории',
            'ID источника',
            'Фото',
            'Заголовок',
            'Новость приватная',
            'Краткое описание',
            'Полный текст',
            'Создана',
            'Отредактирована',
            'Удалена'
        ];
    }
}