<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = ArticleService::getOrderedArticles();

        return view('pages.guest.home', compact([
            'articles',
        ]));
    }
}
