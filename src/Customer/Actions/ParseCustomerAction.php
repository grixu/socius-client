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
            'postalCode' => (string) $item['postal_code'],
            'city' => (string) $item['city'],
            'vatNumber' => (string) $item['vat_number'],
            'street' => (string) $item['street'],
            'voivodeship' => (string) $item['voivodeship'],
            'district' => (string) $item['district'],
            'phone1' => (string) $item['phone1'],
            'phone2' => (string) $item['phone2'],
            'email' => (string) $item['email'],
            'paymentPeriod' => (int) $item['payment_period'],
            'xlId' => (int) $item['xl_id'],
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'operatorId' => (int) $item['operator_id'],
            'operator' => $operator,
        ];
    }
}
