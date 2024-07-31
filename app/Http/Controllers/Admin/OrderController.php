<?php

namespace App\Http\Controllers\Admin;

use App\Constants;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\OrderAttachmentService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::with('type')->get();

        return view('pages.admin.order.index', compact('products'));
    }

    public function getAttachment(string $id)
    {
        $images = OrderAttachmentService::getAttachment($id);

        return response()->json([
            'status' => 'success',
            'data' => $images,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string',
            'date_in' => 'nullable|date',
            'date_out' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'required|in:' . implode(',', Constants::ORDER_STATUS),
            'attachments' => 'array',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'product_id.required' => 'Pilih produk terlebih dahulu',
            'attachments.*.file' => 'Lampiran harus berupa file',
            'attachments.*.max' => 'Ukuran lampiran maksimal 2MB',
        ]);

        DB::beginTransaction();

        $order = OrderService::store(
            $request->product_id,
            $request->customer_name,
            $request->date_in,
            $request->date_out,
            $request->description,
            $request->status
        );

        OrderAttachmentService::store($order->id, $request->attachments);

        DB::commit();

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
            'date_in' => 'nullable|date',
            'date_out' => 'nullable|date',
            'description' => 'nullable|string',
        ], [
            'product_id.required' => 'Pilih produk terlebih dahulu',
        ]);

        OrderService::update(
            $request->id,
            $request->product_id,
            $request->customer_name,
            $request->date_in,
            $request->date_out,
            $request->description,
            null
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Order berhasil diubah',
        ]);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
            'status' => 'required|in:' . implode(',', Constants::ORDER_STATUS),
        ]);

        OrderService::update(
            $request->id,
            null,
            null,
            null,
            null,
            null,
            $request->status
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Status order berhasil diubah',
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

    public function table(Request $request)
    {
        return OrderService::getDataTable($request->status);
    }
}
