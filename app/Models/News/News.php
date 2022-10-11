<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
