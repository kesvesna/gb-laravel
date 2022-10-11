<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.news.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create($id = null)
    {
        if (!is_null($id)) {
            return view('admin.news.categories.create', [
                'category' => Category::find($id)
            ]);
        }
        return view('admin.news.categories.create', [
            'category' => new Category()
        ]);
    }

    public function view($id)
    {
        return view('admin.news.categories.view', [
            'category' => Category::find($id)
        ]);
    }

    public function store(Request $request, $category_id = null)
    {
        if ($request->isMethod(('post'))) {
            $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'slug' => ['required', 'string', 'min:3', 'max:50']
            ]);

            $category = Category::find($category_id);

            if (!$category) {
                $category = new Category();
            }

            $category->name = $request->input('name');
            $category->slug = $request->input('slug');


            if ($category->save()) {
                return \redirect()
                    ->route('admin.news.categories.view', ['id' => $category->id])
                    ->with('success', 'Запись добавлена');
            }

        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            Category::find($id)->delete();
        }

        return redirect()->route('admin.news.categories.index', [
            'categories' => Category::all()
        ]);
    }
}
