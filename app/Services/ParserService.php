<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News\Category;
use App\Models\News\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]',
            ]
        ]);

        $e = \explode('/', $this->link);

//        $fileName = end($e);
//        $jsonEncode = json_encode($data);
//        Storage::append('news/' . $fileName, $jsonEncode);

        foreach($data['news'] as $new) {
            $new['pubDate'] = date('Y-m-d h:i:s', strtotime($new['pubDate']));
            News::firstOrCreate($new);
         }
    }
}
