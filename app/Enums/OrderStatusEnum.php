<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatusEnum extends Enum
{
    const WAIT_CONFIRM = 0;
    const DELIVERY = 1;
    const COMPLETE = 2;
    const CANCEL = -1;

    public static function arrayView(): array
    {
        return [
            'Chờ xác nhận' => self::WAIT_CONFIRM,
            'Đang giao hàng' => self::DELIVERY,
            'Đã giao hàng' => self::COMPLETE,
            'Đã hủy' => self::CANCEL,
        ];
    }
}
