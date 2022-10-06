<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\News\NewsCategoriesController as NewsCategoriesController;
use App\Http\Controllers\News\NewsController as NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::view('/vue', 'vue')->name('vue');

Route::get('/save', [HomeController::class, 'save'])->name('save');

//=========================================================================================================
Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::match(['get', 'post'], '/create', [AdminIndexController::class, 'create'])->name('create');
    });

//=========================================================================================================
Route::prefix('news')
    ->group(function(){
        Route::get('/export', [NewsController::class, 'export'])->name('export');
        Route::get('/pdf', [NewsController::class, 'pdf'])->name('pdf');
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/{category}/{id}', [NewsController::class, 'show'])->where('id', '[0-9]+')->name('news.one');
        Route::get('/{category}', [NewsCategoriesController::class, 'show'])->name('category');
    });

//==============================================================================

Route::view('/about','about')->name('about');

Route::fallback(function (){
    return view('errors.404');
});

Auth::routes();

// routes for pictures from storage
Route::get('storage/{filename}', function($filename)
{

    $path = storage_path('app/public/' . $filename);

    if(!File::exists($path))
    {
        abort(404);
    }

    $file=File::get($path);
    $type=File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);

    return $response;
});

