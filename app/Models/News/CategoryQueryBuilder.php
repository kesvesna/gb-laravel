<?php

declare(strict_types=1);

namespace App\Models\News;



use FontLib\TrueType\Collection;
use Illuminate\Database\Eloquent\Builder;

final class CategoryQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection
    {
        return $this->model->get();
    }

    public function getCategoryById(int $id): object
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->fill($data)->save();
    }

    public function delete(int $id): bool
    {
        $category = $this->model->findOrFail($id);
        return $category->delete();
    }
}
