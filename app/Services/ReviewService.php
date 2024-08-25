<?php

namespace App\Services;

use App\Models\Review;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ReviewService.
 */
class ReviewService
{
    public static function getAllReview()
    {
        return Review::all();
    }

    public static function getOrderedReviews()
    {
        return Review::orderBy('title', 'asc')->get();
    }

    public static function getReviewById($id)
    {
        return Review::findOrFail($id);
    }

    public static function store($title, $description, $image, $rating)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/article', $filename);

        return Review::create([
            'title' => $title,
            'description' => $description,
            'image' => $filename,
            'rating' => $rating,
        ]);
    }


    public static function update($id, $title, $description, $image, $rating)
    {
        $review = Review::findOrFail($id);

        $filename = $review->image;

        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/article', $filename);
        }

        $review->update([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'image' => $filename,
            'rating' => $rating,
        ]);

        return $review;
    }

    public static function delete($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();
    }

    public static function getDataTable()
    {
        $query = Review::query();

        
        return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('title', function ($query) {
            return $query->title;
        })
        ->addColumn('description', function ($query) {
            return $query->description;
        })
        
        ->addColumn('rating', function ($query) {
            return $query->rating;
        })

             
        ->addColumn('image', function ($query) {
            return $query->image;
        })
        
        ->addColumn('action', function ($query) {
            return view('pages.admin.review.menu', compact('query'));
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }
}
