<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection
    {
        return $this->model->get();
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }
}
