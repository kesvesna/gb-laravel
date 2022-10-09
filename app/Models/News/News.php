<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "news";

    protected $fillable = [
        'category_id',
        'source_id',
        'image',
        'title',
        'is_private',
        'short_description',
        'description'
    ];

    private Category $category;

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoriesBySlug($slug);
        $news = [];
        foreach($this->getNews() as $item)
        {
            if($item['category_id'] == $id)
            {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNews()
    {
        return $this::all();
    }

    public function getNewsId($id)
    {
        return DB::table('news')->find($id);
    }

    public function getByCategoriesId($id)
    {
        return DB::table('news')->where('category_id', '=', $id)->get();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class)->withDefault();
    }

    //TODO scopes, mutators

}
