<?php

return [
    'base_url' => env('SOCIUS_BASE_URL'),

    'auth_url' => env('SOCIUS_OAUTH'),
    'auth_data' => [
        'key' => env('SOCIUS_CLIENT_ID'),
        'secret' => env('SOCIUS_CLIENT_KEY')
    ],

    'product' => [
        'url' => '/api/product',
        'filters' => [
            'name',
            'index',
            'ean',
            'brandId',
            'productTypeId',
            'blocked',
            'archived',
            'eshop',
            'availability',
            'attachments',
            'price',
            'priceLower',
            'priceGreater',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter',
            'isNull',
            'notNull'
        ],
        'includes' => [
            'brand',
            'productType',
            'stocks',
            'descriptions',
        ],
        'sorts' => [
            'name',
            'index',
            'price'
        ],
    ],

    'brand' => [
        'url' => '/api/brand',
        'filters' => [
            'name',
        ],
        'includes' => [
            'products',
        ],
        'sorts' => [
            'name'
        ],
    ],

    'product_type' => [
        'url' => '/api/product_type',
        'filters' => [
            'name',
        ],
        'includes' => [
            'products'
        ],
        'sorts' => [
            'name'
        ],
    ],

    'category' => [
        'url' => '/api/category',
        'filters' => [
            'name',
            'parentId',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'children',
            'parent'
        ],
        'sorts' => [
            'name',
            'parentId'
        ],
    ],

    'customer' => [
        'url' => '/api/customer',
        'filters' => [
            'name',
            'country',
            'postalCode',
            'city',
            'vatNumber',
            'street',
            'voivodeship',
            'district',
            'phone1',
            'phone2',
            'email',
            'operatorId',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'operator',
        ],
        'sorts' => [
            'name',
            'country',
            'voivodeship',
            'operatorId'
        ],
    ],

    'branch' => [
        'url' => '/api/branch',
        'filters' => [
            'name',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'operators',
        ],
        'sorts' => [
            'name',
        ],
    ],

    'operator' => [
        'url' => '/api/operator',
        'filters' => [
            'name',
            'xlUsername',
            'email',
            'operatorRoleId',
            'xlId',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'role',
            'customers',
            'branches',
        ],
        'sorts' => [
            'name',
            'email',
            'xlUsername'
        ],
    ],

    'operator_role' => [
        'url' => '/api/operator_role',
        'filters' => [
            'name',
        ],
        'includes' => [
            'operators',
        ],
        'sorts' => [
            'name',
        ],
    ],

    'language' => [
        'url' => '/api/language',
        'filters' => [
            'name',
        ],
        'includes' => [],
        'sorts' => [
            'name'
        ],
    ],

    'description' => [
        'url' => '/api/description',
        'filters' => [
            'name',
            'desc',
            'pageTitle',
            'keywords',
            'metaDesc',
            'url',
            'lastModification',
            'lastModificationBefore',
            'lastModificationBetween',
            'lastModificationAfter',
            'lastModificationDesc',
            'lastModificationDescBefore',
            'lastModificationDescBetween',
            'lastModificationDescAfter',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'product',
            'language'
        ],
        'sorts' => [
            'name',
            'languageId'
        ],
    ],

    'warehouse' => [
        'url' => '/api/warehouse',
        'filters' => [
            'name',
            'desc',
            'internal',
            'country',
            'stockCounting',
            'stockCountingDate',
            'stockCountingDateBefore',
            'stockCountingDateBetween',
            'stockCountingDateAfter',
            'locked',
            'lastModification',
            'lastModificationBefore',
            'lastModificationBetween',
            'lastModificationAfter',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'customer',
            'operator',
            'stocks'
        ],
        'sorts' => [
            'name',
            'internal',
            'country',
            'locked',
            'stockCounting',
            'lastModification'
        ],
    ],

    'stock' => [
        'url' => '/api/stock',
        'filters' => [
            'amount',
            'amountGreater',
            'amountLower',
            'productId',
            'warehouseId',
            'reception',
            'receptionBefore',
            'receptionBetween',
            'receptionAfter',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter'
        ],
        'includes' => [
            'product',
            'warehouse'
        ],
        'sorts' => [
            'productId',
            'warehouseId',
            'receptionDate'
        ],
    ],
];
