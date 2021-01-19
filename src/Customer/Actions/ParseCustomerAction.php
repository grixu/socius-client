<?php

namespace Grixu\SociusClient\Customer\Actions;

use Grixu\SociusClient\Operator\Actions\ParseOperatorAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Illuminate\Support\Carbon;

/**
 * Class ParseCustomerAction
 * @package Grixu\SociusClient\Customer\Actions
 */
class ParseCustomerAction
{
    public function execute(array $item): array
    {
        $operator = null;
        if (!empty($item['operator'])) {
            $actionHelper = new ParseOperatorAction();
            $operator = new OperatorData($actionHelper->execute($item['operator']));
        }

        return [
            'id' => (int) $item['id'],
            'name' => (string) $item['name'],
            'country' => (string) $item['country'],
            'postalCode' => (string) $item['postalCode'],
            'city' => (string) $item['city'],
            'vatNumber' => (string) $item['vatNumber'],
            'street' => (string) $item['street'],
            'voivodeship' => (string) $item['voivodeship'],
            'district' => (string) $item['district'],
            'phone1' => (string) $item['phone1'],
            'phone2' => (string) $item['phone2'],
            'email' => (string) $item['email'],
            'paymentPeriod' => (int) $item['paymentPeriod'],
            'xlId' => (int) $item['xlId'],
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'operatorId' => (int) $item['operatorId'],
            'operator' => $operator,
        ];
    }
}
