<?php

namespace App\Services;

use App\Exports\OrderExport;
use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
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

    public static function isProductOrdered($product_id)
    {
        return Order::where('product_id', $product_id)->exists();
    }

    public static function getByProductId($product_id)
    {
        return Order::where('product_id', $product_id)->get();
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
            'product_id' => $product_id ?? $order->product_id,
            'customer_name' => $customer_name ?? $order->customer_name,
            'date_in' => $date_in ?? $order->date_in,
            'date_out' => $date_out ?? $order->date_out,
            'description' => $description ?? $order->description,
            'status' => $status ?? $order->status,
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

    public static function export($dateStart, $dateEnd)
    {
        $datas = Order::with([
            'product',
            'product.type',
        ])->whereBetween('created_at', [$dateStart, $dateEnd])->get();

        $date = Carbon::parse($dateStart)->translatedFormat('l, d F Y') . ' - ' . Carbon::parse($dateEnd)->translatedFormat('l, d F Y');

        return Excel::download(
            new OrderExport($date, $datas),
            'order.xlsx'
        );
    }

    public static function getDataTable($status = null, $product_id = null)
    {
        $query = Order::with([
            'product',
            'product.type',
        ]);

        if ($status && $status !== "All") {
            $query = $query->where('status', $status);
        }

        if ($product_id) {
            $query = $query->where('product_id', $product_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function ($query) {
                return $query->product->name;
            })
            ->addColumn('type_name', function ($query) {
                return $query->product->type->name;
            })
            ->addColumn('product_number', function ($query) {
                return $query->productNumber->number;
            })
            ->addColumn('status', function ($query) {
                $status = $query->status;
                return view('pages.admin.order.status', compact('status'));
            })
            ->addColumn('action', function ($query) {
                return view('pages.admin.order.menu', compact('query'));
            })
            ->addColumn('date_in', function ($query) {
                if (!$query->date_in) {
                    return '-';
                }

                return Carbon::parse($query->date_in)->translatedFormat('l, d F Y H:i');
            })
            ->addColumn('date_out', function ($query) {
                if (!$query->date_out) {
                    return '-';
                }

                return Carbon::parse($query->date_out)->translatedFormat('l, d F Y H:i');
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
