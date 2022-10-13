<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Categories\CreateCategoryRequest;
use App\Models\News\Category;
use App\Models\News\CategoryQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryQueryBuilder $builder)
    {
        return view('admin.news.categories.index', [
            'categories' => $builder->getCategories()
        ]);
    }

    public function create(CategoryQueryBuilder $builder, $id = null)
    {

        if (!is_null($id)) {
            return view('admin.news.categories.create', [
                'category' => $builder->getCategoryById($id),
            ]);
        }
        return view('admin.news.categories.create', [
            'category' => new Category(),
        ]);
    }

    public function view(CategoryQueryBuilder $builder, $id)
    {
        return view('admin.news.categories.view', [
            'category' => $builder->getCategoryById($id),
        ]);
    }

    public function store(CreateCategoryRequest $request, CategoryQueryBuilder $builder, Category $category, $category_id = null): RedirectResponse
    {
        if ($request->isMethod(('post'))) {

            if (is_null($category_id)) {
                $category = $builder->create($request->validated());
            } else {
                $category = $builder->getCategoryById($category_id);
                $category = $category->fill($request->validated());
            }

            if ($category->save()) {
                return \redirect()
                    ->route('admin.news.categories.view', ['id' => $category->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete(CategoryQueryBuilder $builder, $id = null)
    {
        if (!is_null($id)) {
            $builder->delete($id);
        }

        return redirect()->route('admin.news.categories.index', [
            'categories' => $builder->getCategories(),
        ]);
    }
}
