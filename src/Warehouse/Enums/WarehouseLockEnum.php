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
            'UNLOCKED' => 'Domain\\Warehouse\\States\\WarehouseUnlocked',
            'MANUALLY' => 'Domain\\Warehouse\\States\\WarehouseLockedManually',
            'COUNTING' => 'Domain\\Warehouse\\States\\WarehouseLockedStockCountingPartial',
            'COUNTING_FULL' => 'Domain\\Warehouse\\States\\WarehouseLockedStockCountingFull',
            'DEPRECATION' => 'Domain\\Warehouse\\States\\WarehouseLockedDepreciation',
        ];
    }
}
