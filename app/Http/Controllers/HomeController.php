<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\ProductService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = ArticleService::getOrderedArticles();
        $reviews = ReviewService::getAllReview();
        $products = ProductService::getProducts(3);

        return view('pages.guest.home', compact([
            'articles', 'reviews', 'products'
        ]));
    }
}
