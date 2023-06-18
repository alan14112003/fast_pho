<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductFilterEnum extends Enum
{
    const ALL = 'all';
    const NEW = 'new';
    const SALE = 'sale';

    public static function ArrayView()
    {
        return [
            'Tất cả' => self::ALL,
            'Mới' => self::NEW,
            'Bán chạy' => self::SALE,
        ];
    }
}
