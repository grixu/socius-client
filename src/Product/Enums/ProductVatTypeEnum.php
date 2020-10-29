<?php

namespace Grixu\SociusClient\Product\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self VAT23()
 * @method static self VAT8()
 * @method static self VAT7()
 * @method static self VAT5()
 * @method static self VAT3()
 * @method static self VAT0()
 */
final class ProductVatTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'VAT23' => 'A',
            'VAT8' => 'B',
            'VAT7' => 'C',
            'VAT5' => 'D',
            'VAT3' => 'E',
            'VAT0' => 'F',
        ];
    }
}
