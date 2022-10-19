<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\News;
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
        $load = $parser->setLink('https://lenta.ru/rss')
                        ->getParseData();

        foreach($load['news'] as $new) {
            $new['pubDate'] = date('Y-m-d h:i:s', strtotime($new['pubDate']));
            News::firstOrCreate($new);
        }

        return redirect()->route('admin.news.index');
    }
}
