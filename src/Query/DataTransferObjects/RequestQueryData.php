<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Grixu\SociusClient\SociusRequest;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class RequestQueryData
 * @package Grixu\SociusClient\Query\DataTransferObjects
 */
class RequestQueryData extends DataTransferObject
{
    public ?FilterDataCollection $filters;
    public ?array $sorts;
    public ?array $includes;
    public ?int $page;

    public static function fromRequest(SociusRequest $request): RequestQueryData
    {
        return new RequestQueryData(
            [
                'filters' => FilterDataCollection::create($request->validated()['filters']),
                'sorts' => $request->validated()['sorts'],
                'includes' => $request->validated()['includes']
            ]
        );
    }
}
