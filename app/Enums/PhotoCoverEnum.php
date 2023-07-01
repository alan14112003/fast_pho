<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PhotoCoverEnum extends Enum
{
    const NO_COVER = 0;
    const BLUE_COVER = 1;
    const GREEN_COVER = 2;
    const YELLOW_COVER = 3;
    const PINK_COVER = 4;

    public static function arrayView(): array
    {
        return [
            'Không bìa' => self::NO_COVER,
            'Bìa xanh dương' => self::BLUE_COVER,
            'Bìa xanh lá' => self::BLUE_COVER,
            'Bìa vàng' => self::YELLOW_COVER,
            'Bìa hồng' => self::PINK_COVER,
        ];
    }

    public static function getNameByValue($value): bool|int|string
    {
        return array_search($value, self::arrayView(), true);
    }
}
