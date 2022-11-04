<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\Source;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {

        // TODO get urls from database table with name sources
        $urls = Source::all();

        foreach($urls as $url) {
            \dispatch(new JobNewsParsing($url->name));
        }

        return "Парсинг закончен <br><a href='javascript:history.back()'>Назад</a>";
    }
}
