<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\ProductNumberService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $query = ProductService::getProductById($id);

        return view('pages.admin.product.detail.index', compact('query'));
    }

    public function storeNumber(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
        ]);

        if (!ProductService::isProductExist($id)) {
            throw new HttpException(404, 'Produk tidak ditemukan');
        }

        if (ProductNumberService::isExist($id, $request->number)) {
            throw new HttpException(400, 'Nomor Plat ini sudah ada');
        }

        ProductNumberService::store($id, $request->number);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan nomor plat',
        ]);
    }

    public function updateNumber(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'number' => 'required',
        ]);

        ProductNumberService::update($request->id, $request->number);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah nomor plat',
        ]);
    }

    public function deleteNumber(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ProductNumberService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus nomor plat',
        ]);
    }

    public function orderTable(Request $request, $id)
    {
        return OrderService::getDataTable($request->status, $id);
    }

    public function numberTable($id)
    {
        return ProductNumberService::getDataTable($id);
    }
}
