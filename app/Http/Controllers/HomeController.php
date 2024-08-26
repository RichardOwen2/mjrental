<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = ArticleService::getOrderedArticles();
        $reviews = Review::all();

        return view('pages.guest.home', compact([
            'articles', 'reviews'
        ]));
    }
}
