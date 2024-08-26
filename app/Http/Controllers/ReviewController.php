<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.review.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        ReviewService::store(
            $request->title,
            $request->description,
            $request->file('image'),
            $request->rating
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
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        ReviewService::update(
            $request->id,
            $request->title,
            $request->description,
            $request->file('image'),
            $request->rating
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Review berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        ReviewService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'review berhasil dihapus'
        ]);
    }

    public function table()
    {
        return ReviewService::getDataTable();
    }
}
