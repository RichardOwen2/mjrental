<?php

namespace App;

class Helpers
{
    public static function numberFormat($number)
    {
        return number_format($number, 0, ',', '.');
    }
}
