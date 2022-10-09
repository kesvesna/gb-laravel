<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "news_categories";

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getCategories()
    {
        return Category::all();
    }

    public function getCategoriesBySlug($slug)
    {
        return DB::table('news_categories')->where('slug', '=', $slug)->get();
    }

    public function getCategorySlugById($id): string
    {
        $category = DB::table('news_categories')->find($id);
        return $category->slug;
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
