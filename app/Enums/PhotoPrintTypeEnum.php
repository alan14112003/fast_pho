<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PhotoPrintTypeEnum extends Enum
{
    const PAPER = 0;
    const SHEETS = 1;

    public static function arrayView(): array
    {
        return [
            'Trang - Theo dạng từng tờ' => self::PAPER,
            'Tập - Theo dạng cuốn' => self::SHEETS,
        ];
    }

    public static function getNameByValue($value): bool|int|string
    {
        return array_search($value, self::arrayView(), true);
    }
}
