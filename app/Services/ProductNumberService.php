<?php

namespace App\Services;

use App\Models\ProductNumber;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ProductNumberService.
 */
class ProductNumberService
{
    public static function isExist($product_id, $number)
    {
        return ProductNumber::where('product_id', $product_id)->where('number', $number)->exists();
    }

    public static function store($product_id, $number)
    {
        return ProductNumber::create([
            'product_id' => $product_id,
            'number' => $number,
        ]);
    }

    public static function update($id, $number)
    {
        $product = ProductNumber::findOrFail($id);

        return $product->update([
            'number' => $number,
        ]);
    }

    public static function delete($id)
    {
        $product = ProductNumber::findOrFail($id);

        if ($product->orders()->exists()) {
            throw new HttpException(400, 'Nomor Plat ini memiliki order');
        }

        return $product->delete();
    }

    public static function getDataTable($product_id = null)
    {
        $query = ProductNumber::query();

        if ($product_id && $product_id !== 'All') {
            $query = $query->where('product_id', $product_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                return view('pages.admin.product.detail.number-menu', compact('query'));
            })
            ->addColumn('order_count', function ($query) {
                return $query->orders()->count() . " Order";
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
