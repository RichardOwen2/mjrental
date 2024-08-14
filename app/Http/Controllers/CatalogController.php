<?php

namespace App\Http\Controllers;

use App\Services\ProductImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();

        return view('pages.guest.catalog.index', compact('products'));
    }

    public function detail($id)
    {
        $product = ProductService::getProductById($id);
        $pictures = ProductImageService::getImages($id);

        return view('pages.guest.catalog.detail.index', compact([
            'product', 'pictures'
        ]));
    }
}
