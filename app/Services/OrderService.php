<?php

namespace App\Services;

use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class OrderService.
 */
class OrderService
{
    public static function getAllOrders()
    {
        return Order::all();
    }

    public static function getOrderById($id)
    {
        return Order::findOrFail($id);
    }

    public static function store($product_id, $customer_name, $date_in, $date_out, $description, $status)
    {
        return Order::create([
            'product_id' => $product_id,
            'customer_name' => $customer_name,
            'date_in' => $date_in,
            'date_out' => $date_out,
            'description' => $description,
            'status' => $status,
        ]);
    }

    public static function update($id, $product_id, $customer_name, $date_in, $date_out, $description, $status)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'product_id' => $product_id,
            'customer_name' => $customer_name,
            'date_in' => $date_in,
            'date_out' => $date_out,
            'description' => $description,
            'status' => $status,
        ]);

        return $order;
    }

    public static function delete($id)
    {
        $order = Order::findOrFail($id);

        if ($order->products()->exists()) {
            throw new HttpException(400, 'Tidak bisa menghapus tipe yang memiliki produk');
        }

        $order->delete();
    }

    public static function getDataTable()
    {
        $query = Order::query();

        return DataTables::of($query)
            ->addIndexColumn()
            // ->addColumn('product_count', function ($query) {
            //     return $query->products()->count() . " Produk";
            // })
            // ->addColumn('action', function ($query) {
            //     return view('pages.admin.order.menu', compact('query'));
            // })
            ->rawColumns(['action'])
            ->make(true);
    }
}
