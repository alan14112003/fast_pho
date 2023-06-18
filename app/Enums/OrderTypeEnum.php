<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderTypeEnum extends Enum
{
    const COD = 0;
    const TRANSFER = 1;

    public static function arrayView(): array
    {
        return [
            'Trực tiếp' => self::COD,
            'Chuyển khoản' => self::TRANSFER,
        ];
    }

    public static function getNameByValue($value): bool|int|string
    {
        return array_search($value, self::arrayView(), true);
    }
}
