<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application News API Key
    |--------------------------------------------------------------------------
    |
    | This value is the News API key that your application will use to access
    | news articles from the NewsAPI service. The key is stored in the .env
    | file for security, and can be accessed here via the `config` helper.
    | The default value is set to 'Laravel' for development purposes, but
    | it should be replaced with your actual API key in production.
    |
    */

    'news_api_key' => env('NEWS_API_KEY', 'Laravel'),
];
