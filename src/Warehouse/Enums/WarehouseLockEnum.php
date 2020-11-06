<?php

namespace Grixu\SociusClient\Warehouse\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DEPRECATION()
 * @method static self MANUALLY()
 * @method static self COUNTING()
 * @method static self COUNTING_FULL()
 * @method static self UNLOCKED()
 */
class WarehouseLockEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'UNLOCKED' => '0',
            'STOCKTAKING_TOTAL' => '1',
            'STOCKTAKING_PARTIAL' => '2',
            'DEPRECIATION' => '11',
            'MANUALLY' => '21',
        ];
    }
}
