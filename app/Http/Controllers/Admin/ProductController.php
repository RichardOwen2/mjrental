<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProductImageService;
use App\Services\ProductService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $types = TypeService::getAllTypes();

        return view('pages.admin.product.index', compact('types'));
    }

    public function getImage(string $id)
    {
        $images = ProductImageService::getImages($id);

        return response()->json([
            'status' => 'success',
            'data' => $images,
        ]);
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
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'type_id.required' => 'Tipe produk wajib diisi',
            'type_id.exists' => 'Tipe produk tidak ditemukan',
        ]);

        DB::beginTransaction();

        $product = ProductService::store(
            $request->type_id,
            $request->name,
            $request->price_day,
            $request->price_week,
            $request->price_month,
            $request->number,
            $request->description
        );

        if ($request->hasFile('image')) {
            ProductImageService::store($product->id, $request->file('image'));
        }

        DB::commit();

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

    public function updateImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        ProductImageService::store($request->id, $request->file('image'));

        return response()->json([
            'status' => 'success',
            'message' => 'Gambar produk berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ProductImageService::deleteByProductId($request->id);
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
