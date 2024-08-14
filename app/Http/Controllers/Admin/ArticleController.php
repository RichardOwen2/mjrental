<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('pages.admin.article.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        ArticleService::store($request->name);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil ditambahkan',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
        ]);

        ArticleService::update($request->id, $request->name);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ArticleService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil dihapus',
        ]);
    }

    public function table()
    {
        return ArticleService::getDataTable();
    }
}
