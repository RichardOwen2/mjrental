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

    public static function getReviewById($id)
    {
        return Review::findOrFail($id);
    }

    public static function store($name, $review, $image, $rating)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/review', $filename, 'uploads');

        return Review::create([
            'name' => $name,
            'review' => $review,
            'image' => $filename,
            'rating' => $rating,
        ]);
    }


    public static function update($id, $name, $review, $image, $rating)
    {
        $review = Review::findOrFail($id);

        $filename = $review->image;

        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/review', $filename, 'uploads');
        }

        $review->update([
            'id' => $id,
            'name' => $name,
            'review' => $review,
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
        ->addColumn('name', function ($query) {
            return $query->name;
        })
        ->addColumn('review', function ($query) {
            return $query->review;
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
