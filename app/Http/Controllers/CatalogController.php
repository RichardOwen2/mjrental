<?php

namespace App\Http\Controllers;

use App\Services\ProductImageService;
use App\Services\ProductService;
use App\Services\TypeService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type != "" && $request->type != '*') {
            $type = TypeService::getTypeByName($request->type);
            $products = ProductService::getProductsByType($type->id);
        } else {
            $products = ProductService::getAllProducts();
        }

        $types = TypeService::getAllTypes();

        return view('pages.guest.catalog.index', compact([
            'products', 'types'
        ]));
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
