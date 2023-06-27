<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PhotoTypeEnum extends Enum
{
    const A5 = 0;
    const A4_70 = 1;
    const A4_80 = 2;
    const A3 = 3;

    public static function arrayView(): array
    {
        return [
            'A5' => self::A5,
            'A4 70gsm' => self::A4_70,
            'A4 80gsm' => self::A4_80,
            'A3' => self::A3,
        ];
    }

    public static function getNameByValue($value): bool|int|string
    {
        return array_search($value, self::arrayView(), true);
    }
}
