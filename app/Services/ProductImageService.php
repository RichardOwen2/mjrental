<?php

namespace App\Services;

use App\Models\ProductImage;

/**
 * Class ProductImageService.
 */
class ProductImageService
{
    public static function store($product_id, $images)
    {
        ProductImage::where('product_id', $product_id)->delete();

        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/product/image', $filename);

            ProductImage::create([
                'product_id' => $product_id,
                'image' => $filename,
            ]);
        }
    }

    public static function getImages($product_id)
    {
        return ProductImage::where('product_id', $product_id)->get();
    }

    public static function deleteByProductId($product_id)
    {
        ProductImage::where('product_id', $product_id)->delete();
    }
}
