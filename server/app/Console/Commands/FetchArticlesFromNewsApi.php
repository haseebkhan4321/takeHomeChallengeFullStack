<?php

namespace App\Console\Commands;

use App\Services\ArticleService;
use Illuminate\Console\Command;

class FetchArticlesFromNewsApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-articles-from-news-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(ArticleService $articleService)
    {
        $data = $articleService->fetchArticlesFromNewsApi();
        dd($data);
    }
}
