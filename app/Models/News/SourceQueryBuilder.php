<?php

declare(strict_types=1);

namespace App\Models\News;

use App\Models\News\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourceQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    public function getSources(): Collection
    {
        return $this->model->get();
    }

    public function getSourceById(int $id): object
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Source
    {
        return Source::create($data);
    }

    public function update(Source $category, array $data): bool
    {
        return $category->fill($data)->save();
    }

    public function delete(int $id): bool
    {
        $category = $this->model->findOrFail($id);
        return $category->delete();
    }
}
