<?php

namespace App\Jobs;

use App\Models\News\News;
use App\Services\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser): void
    {
        $parser->setLink($this->link)
                        ->saveParseData();

        //foreach($load['news'] as $new) {
        //    $new['pubDate'] = date('Y-m-d h:i:s', strtotime($new['pubDate']));
        //    News::firstOrCreate($new);
       // }
    }
}
