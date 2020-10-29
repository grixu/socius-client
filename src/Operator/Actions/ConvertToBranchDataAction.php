<?php

namespace Grixu\SociusClient\Operator\Actions;

use Grixu\SociusClient\Operator\DataTransferObjects\BranchDataCollection;

/**
 * Class ConvertToBranchDataAction
 * @package Grixu\SociusClient\Operator\Actions
 */
class ConvertToBranchDataAction
{
    private ParseBranchAction $branchParser;

    /**
     * ConvertToBranchDataAction constructor.
     */
    public function __construct()
    {
        $this->branchParser = new ParseBranchAction();
    }

    public function execute(array $data): BranchDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->branchParser->execute($item);
        })->toArray();

        return BranchDataCollection::create($finalData);
    }
}
