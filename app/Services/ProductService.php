<?php

namespace App\Services;

use App\Helpers;
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

    public static function store($type_id, $name, $price_day, $price_week, $price_month, $number, $description, $cover)
    {
        $filename = time() . '_' . $cover->getClientOriginalName();
        $cover->storeAs('public/product/image', $filename);

        return Product::create([
            'type_id' => $type_id,
            'name' => $name,
            'price_day' => $price_day,
            'price_week' => $price_week,
            'price_month' => $price_month,
            'number' => $number,
            'description' => $description,
            'cover' => $filename,
        ]);
    }

    public static function update($id, $type_id, $name, $price_day, $price_week, $price_month, $number, $description, $cover)
    {
        $product = Product::findOrFail($id);

        $filename = $product->cover;

        if ($cover) {
            $filename = time() . '_' . $cover->getClientOriginalName();
            $cover->storeAs('public/product/image', $filename);
        }

        $product->update([
            'type_id' => $type_id,
            'name' => $name,
            'price_day' => $price_day,
            'price_week' => $price_week,
            'price_month' => $price_month,
            'number' => $number,
            'description' => $description,
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
            ->addColumn('type_name', function ($query) {
                return $query->type->name;
            })
            ->addColumn('price', function ($query) {
                return "Rp " . Helpers::numberFormat($query->price_day) . " / Rp " . Helpers::numberFormat($query->price_week) . " / Rp " . Helpers::numberFormat($query->price_month);
            })
            ->addColumn('action', function ($query) {
                return view('pages.admin.product.menu', compact('query'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
