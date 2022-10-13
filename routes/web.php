<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\News\IndexController as AdminNewsIndexController;
use App\Http\Controllers\Admin\News\CategoryController as AdminNewsCategoriesController;
use App\Http\Controllers\Admin\News\SourceController as AdminNewsSourcesController;

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

Route::prefix('news')
    ->namespace('News')
    ->group(function () {
        Route::get('/export', [NewsController::class, 'export'])->name('export');
        Route::get('/pdf', [NewsController::class, 'pdf'])->name('pdf');
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/{categories}/{id}', [NewsController::class, 'show'])->where('id', '[0-9]+')->name('news.one');
        Route::get('/{categories}', [NewsCategoriesController::class, 'show'])->name('categories');
    });

//==============================================================================

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {

        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::match(['get', 'post'], '/create', [AdminIndexController::class, 'create'])->name('create');

        Route::name('news.')
            ->prefix('news')
            ->namespace('News')
            ->group(function () {
                Route::get('/', [AdminNewsIndexController::class, 'index'])->name('index');
                Route::get('/create/{id?}', [AdminNewsIndexController::class, 'create'])->name('create');
                Route::get('/view/{id}', [AdminNewsIndexController::class, 'view'])->name('view');
                Route::post('/store/{id?}', [AdminNewsIndexController::class, 'store'])->name('store');
                //Route::get('/delete/{id}', [AdminNewsIndexController::class, 'delete'])->name('delete');
                Route::delete('/delete/{id}', [AdminNewsIndexController::class, 'delete'])->name('delete');


                Route::name('categories.')
                    ->prefix('categories')
                    ->namespace('categories')
                    ->group(function () {
                        Route::get('/', [AdminNewsCategoriesController::class, 'index'])->name('index');
                        Route::get('/create/{id?}', [AdminNewsCategoriesController::class, 'create'])->name('create');
                        Route::get('/view/{id}', [AdminNewsCategoriesController::class, 'view'])->name('view');
                        Route::post('/store/{id?}', [AdminNewsCategoriesController::class, 'store'])->name('store');
                        Route::get('/delete/{id}', [AdminNewsCategoriesController::class, 'delete'])->name('delete');
                    });

//                Route::resource('categories', AdminNewsCategoriesController::class)->only([
//                    '/', '/create/{id?}', '/view/{id}', '/store/{id?}', '/deleted/{id}'
//                ]);

                //Route::resource('categories', AdminNewsCategoriesController::class)->shallow();

//                Route::resource('categories', AdminNewsCategoriesController::class)->names([
//                    '/' => 'categories.index',
//                    '/create/{id?}' => 'categories.create'
//                ]);

                Route::name('sources.')
                    ->prefix('sources')
                    ->namespace('sources')
                    ->group(function () {
                        Route::get('/', [AdminNewsSourcesController::class, 'index'])->name('index');
                        Route::get('/create/{id?}', [AdminNewsSourcesController::class, 'create'])->name('create');
                        Route::get('/view/{id}', [AdminNewsSourcesController::class, 'view'])->name('view');
                        Route::post('/store/{id?}', [AdminNewsSourcesController::class, 'store'])->name('store');
                        Route::get('/delete/{id}', [AdminNewsSourcesController::class, 'delete'])->name('delete');
                    });

                //TODO DI in routes
            });

    });

//=========================================================================================================


Route::view('/about', 'about')->name('about');

Route::fallback(function () {
    return view('errors.404');
});

Auth::routes();

// routes for pictures from storage
Route::get('storage/{filename}', function ($filename) {

    $path = storage_path('app/public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);

    return $response;
});

