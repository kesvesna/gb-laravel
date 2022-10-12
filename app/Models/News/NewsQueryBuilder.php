<?php

declare(strict_types=1);

namespace App\Models\News;

use FontLib\TrueType\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\News\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getAllNews(): LengthAwarePaginator
    {
        return $this->model
                    ->with('category')
                    ->with('author')
                    ->paginate();
    }

    public function getNewsByCategory(int $category_id, bool $isAdmin = false): LengthAwarePaginator
    {
        if($isAdmin)
        {
            return $this->model
                        ->where('category_id', $category_id)
                        ->with('category')
                        ->with('author')
                        ->paginate();
        }

        return $this->model
                    ->where('category_id', $category_id)
                    ->with('category')
                    ->with('author')
                    ->paginate(); // only active news for other users
    }

    public function getNewsById(int $id): object
    {
        return $this->model
                    ->with('category')
                    ->with('author')
                    ->findOrFail($id);
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }

    public function delete(int $id): bool
    {
        $news = $this->model->findOrFail($id);
        return $news->delete();
    }
}