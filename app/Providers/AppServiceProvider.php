<?php

namespace App\Providers;

use App\Models\News\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NewsQueryBuilder::class);
        $this->app->bind(CategoryQueryBuilder::class);
        $this->app->bind(SourceQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
