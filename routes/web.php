<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\News\NewsCategoriesController as NewsCategoriesController;
use App\Http\Controllers\News\NewsController as NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//phpinfo();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');

//=========================================================================================================
Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
    });

//=========================================================================================================
Route::prefix('news')
    ->group(function(){
        Route::get('/add_new', [NewsController::class, 'add'])->name('add_new');
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/{category}/{id}', [NewsController::class, 'show'])->where('id', '[0-9]+')->name('one_new');
        Route::get('/{category}', [NewsCategoriesController::class, 'show'])->name('category');
    });

//==============================================================================

Route::view('/about','about');

Route::fallback(function (){
    return view('errors.404');
});

