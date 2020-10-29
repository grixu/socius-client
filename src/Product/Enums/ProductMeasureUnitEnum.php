<?php

namespace Grixu\SociusClient\Product\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self PIECE()
 * @method static self KG()
 * @method static self PAIR()
 * @method static self RUNNING_METER()
 * @method static self SET()
 * @method static self PACKING_SET()
 * @method static self METERS()
 * @method static self KILOMETERS()
 * @method static self CUBIC_METERS()
 * @method static self SQUARE_METERS()
 * @method static self TON()
 * @method static self LITERS()
 */
final class ProductMeasureUnitEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'PIECE' => 'SZT',
            'KG' => 'KG',
            'PAIR' => 'PAR',
            'RUNNING_METER' => 'MB',
            'SET' => 'KPL',
            'PACKING_SET' => 'OP',
            'KILOMETERS' => 'KM',
            'METERS' => 'M',
            'SQUARE_METERS' => 'M2',
            'CUBIC_METERS' => 'M3',
            'TON' => 'T',
            'LITERS' => 'L',
        ];
    }
}
