<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ConfigInfoTypeEnum extends Enum
{
    const MAIL_ADMIN = 0;
    const BANK = 1;
}
