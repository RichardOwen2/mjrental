<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\ProductImageService;
use App\Services\ProductNumberService;
use App\Services\ProductService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
            'description' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
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
            $request->description,
            $request->file('cover')
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
            'description' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
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
            $request->description,
            $request->file('cover')
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil diubah',
        ]);
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        ProductImageService::store($request->id, $request->file('image'));

        return response()->json([
            'status' => 'success',
            'message' => 'Gambar produk berhasil ditambahkan',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        if (OrderService::isProductOrdered($request->id)) {
            throw new HttpException(400, 'Tidak bisa menghapus produk yang sudah memiliki order');
        }

        DB::beginTransaction();

        ProductImageService::deleteByProductId($request->id);
        ProductService::delete($request->id);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil dihapus',
        ]);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ProductImageService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Gambar produk berhasil dihapus',
        ]);
    }

    public function table()
    {
        return ProductService::getDataTable();
    }
}
