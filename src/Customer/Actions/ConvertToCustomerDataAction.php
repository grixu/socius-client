<?php

namespace Grixu\SociusClient\Customer\Actions;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerDataCollection;

/**
 * Class ConvertToCustomerDataAction
 * @package Grixu\SociusClient\Customer\Actions
 */
class ConvertToCustomerDataAction
{
    private ParseCustomerAction $customerParser;

    /**
     * ConvertToCustomerDataAction constructor.
     */
    public function __construct()
    {
        $this->customerParser = new ParseCustomerAction();
    }

    public function execute(array $data): CustomerDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->customerParser->execute($item);
        })->toArray();

        return CustomerDataCollection::create($finalData);
    }
}
