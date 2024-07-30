<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\TypeService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $types = TypeService::getAllTypes();

        return view('pages.admin.product.index', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'name' => 'required|string',
            'price_day' => 'required|numeric',
            'price_month' => 'required|numeric',
            'price_week' => 'required|numeric',
            'number' => 'required',
            'description' => 'required|string',
        ], [
            'type_id.required' => 'Tipe produk wajib diisi',
            'type_id.exists' => 'Tipe produk tidak ditemukan',
        ]);

        ProductService::store(
            $request->type_id,
            $request->name,
            $request->price_day,
            $request->price_week,
            $request->price_month,
            $request->number,
            $request->description
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'type_id' => 'required|exists:types,id',
            'name' => 'required|string',
            'price_day' => 'required|numeric',
            'price_month' => 'required|numeric',
            'price_week' => 'required|numeric',
            'number' => 'required',
            'description' => 'required|string',
        ], [
            'type_id.required' => 'Tipe produk wajib diisi',
            'type_id.exists' => 'Tipe produk tidak ditemukan',
        ]);

        ProductService::update(
            $request->id,
            $request->type_id,
            $request->name,
            $request->price_day,
            $request->price_week,
            $request->price_month,
            $request->number,
            $request->description
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ProductService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus',
        ]);
    }

    public function table()
    {
        return ProductService::getDataTable();
    }
}
