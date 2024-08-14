<?php

namespace App\Http\Controllers;

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
        return view('pages.guest.catalog.detail.index', compact('id'));
    }
}
