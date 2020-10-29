<?php

return [
    'base_url' => env('SOCIUS_BASE_URL'),
    'client_key' => env('SOCIUS_CLIENT_KEY'),
    'client_id' => env('SOCIUS_CLIENT_ID'),
    'oauth' => env('SOCIUS_OAUTH'),

    'modules' => [
        'product' => '/product',
        'product_type' => '/product_type',
        'brand' => '/brand',
        'category' => '/category',
        'customer' => '/customer',
        'branch' => '/branch',
        'operator' => '/operator',
        'operator_role' => '/roles',
        'language' => '/language',
        'description' => '/description',
        'warehouse' => '/warehouse',
        'stock' => '/stock',
    ]
];
