<?php

use App\Enums\PhotoCoverEnum;
use App\Enums\PhotoTypeEnum;

if (!function_exists('calculatePhotoOrderPrice')) {
    function calculatePhotoOrderPrice($type, $cover, $quantity)
    {
        $price = 0;
        $rate = PhotoTypeEnum::fromKey(strtoupper($type))->value;

        if ($quantity <= 30) {
            $price += 800 * $quantity;
        } else if ($quantity <= 50) {
            $price += 800 * 30 + 700 * ($quantity - 30);
        } else {
            $price += 800 * 30 + 700 * 20 + 500 * ($quantity - 50);
        }

        $price = $price * $rate / 100;

        if ($cover !== PhotoCoverEnum::NO_COVER) {
            if ($type === PhotoTypeEnum::A3) $price += 1500;
            else if ($type !== PhotoTypeEnum::A5) $price += 1000;
            else $price += 500;
        }

        return $price;
    }
}
