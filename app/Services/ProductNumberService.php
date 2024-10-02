<?php

namespace App\Services;

use App\Models\ProductNumber;

/**
 * Class ProductNumberService.
 */
class ProductNumberService
{
    public static function store($product_id, $number)
    {
        return ProductNumber::create([
            'product_id' => $product_id,
            'number' => $number,
        ]);
    }
}
