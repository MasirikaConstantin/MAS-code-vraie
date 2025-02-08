<?php

namespace App\Services;

use jcobhams\NewsApi\NewsApi;

class NewsService
{
    protected $newsApi;

    public function __construct()
    {
        $this->newsApi = new NewsApi(env('NEWSAPI_KEY'));
    }

    public function getTopHeadlines($query = null, $category = 'technology', $pageSize = 10, $page = 1)
    {
        return $this->newsApi->getTopHeadlines($query, null, 'us', $category, $pageSize, $page);
    }

    public function getEverything($query, $pageSize = 10, $page = 1)
    {
        return $this->newsApi->getEverything($query, null, null, null, null, null, 'fr', 'publishedAt', $pageSize, $page);
    }
}