<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ResultData
 * @package Grixu\SociusClient\Query\DataTransferObjects
 */
class ResultData extends DataTransferObject
{
    public array $data;
    public int $currentPage;
    public int $lastPage;
    public int $perPage;
    public int $total;
    public int $from;
    public int $to;
    public ?string $nextPageUrl;
}
