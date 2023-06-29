<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PhotoPrintTypeEnum extends Enum
{
    const PAPER = 1;
    const SHEETS = 0;

    public static function arrayView(): array
    {
        return [
            'Trang' => self::PAPER,
            'Tập' => self::SHEETS,
        ];
    }

    public static function getNameByValue($value): bool|int|string
    {
        return array_search($value, self::arrayView(), true);
    }
}
