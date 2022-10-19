<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "news_sources";

    protected $fillable = [
        'name',
        'slug'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }
}
