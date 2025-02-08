<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1); // obtenir la page actuelle ou 1 par défaut
        $news = $this->newsService->getTopHeadlines(null, 'technology', 10, $page);
        return view('blog', compact('news', 'page'));
    }
}