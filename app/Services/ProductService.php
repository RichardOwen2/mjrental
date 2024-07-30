<?php

namespace App\Services;

use App\Models\Product;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ProductService.
 */
class ProductService
{
    public static function getAllProducts()
    {
        return Product::all();
    }

    public static function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public static function store($name)
    {
        return Product::create([
            'name' => $name,
        ]);
    }

    public static function update($id, $name)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $name,
        ]);

        return $product;
    }

    public static function delete($id)
    {
        $product = Product::findOrFail($id);

        // if ($product->products()->exists()) {
        //     throw new HttpException(400, 'Tidak bisa menghapus produk');
        // }

        $product->delete();
    }

    public static function getDataTable()
    {
        $query = Product::query();

        return DataTables::of($query)
            ->addIndexColumn()
            // ->addColumn('product_count', function ($query) {
            //     return $query->products()->count() . " Produk";
            // })
            ->addColumn('action', function ($query) {
                return view('pages.admin.product.menu', compact('query'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
