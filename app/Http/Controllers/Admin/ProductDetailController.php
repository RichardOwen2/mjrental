<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $product = ProductService::getProductById($id);

        return view('pages.admin.product.detail.index', compact('product'));
    }
}
