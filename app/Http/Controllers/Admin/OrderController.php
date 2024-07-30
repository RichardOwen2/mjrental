<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::with('type')->get();

        return view('pages.admin.order.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string',
            'date_in' => 'required|date',
            'date_out' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|in:pending,process,done',
        ]);

        $order = OrderService::store(
            $request->product_id,
            $request->customer_name,
            $request->date_in,
            $request->date_out,
            $request->description,
            $request->status
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Order berhasil dibuat',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string',
            'date_in' => 'required|date',
            'date_out' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|in:pending,process,done',
        ]);

        $order = OrderService::update(
            $request->id,
            $request->product_id,
            $request->customer_name,
            $request->date_in,
            $request->date_out,
            $request->description,
            $request->status
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Order berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
        ]);

        OrderService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Order berhasil dihapus'
        ]);
    }

    public function table()
    {
        return OrderService::getDataTable();
    }
}
