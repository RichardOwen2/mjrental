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
            'title' => 'required|string',
            'content' => 'required|string',
            'position' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        ArticleService::store(
            $request->title,
            $request->content,
            $request->position,
            $request->file('image'),
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Konten berhasil ditambahkan',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required|string',
            'content' => 'required|string',
            'position' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        ArticleService::update(
            $request->id,
            $request->title,
            $request->content,
            $request->position,
            $request->file('image'),
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Konten berhasil diubah',
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
            'message' => 'Konten berhasil dihapus',
        ]);
    }

    public function table()
    {
        return ArticleService::getDataTable();
    }
}
