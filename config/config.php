<?php

return [
    'base_url' => env('SOCIUS_BASE_URL'),

    'auth_url' => env('SOCIUS_OAUTH'),
    'auth_data' => [
        'key' => env('SOCIUS_CLIENT_ID'),
        'secret' => env('SOCIUS_CLIENT_KEY'),
    ],

    'product' => [
        'url' => '/api/products',
        'filters' => [
            'xl_id',
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
            'notNull',
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
            'price',
        ],
    ],

    'brand' => [
        'url' => '/api/brands',
        'filters' => [
            'xl_id',
            'name',
        ],
        'includes' => [
            'products',
        ],
        'sorts' => [
            'name',
        ],
    ],

    'product_type' => [
        'url' => '/api/product_types',
        'filters' => [
            'xl_id',
            'name',
        ],
        'includes' => [
            'products',
        ],
        'sorts' => [
            'name',
        ],
    ],

    'category' => [
        'url' => '/api/categories',
        'filters' => [
            'xl_id',
            'name',
            'parentId',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter',
        ],
        'includes' => [
            'children',
            'parent',
        ],
        'sorts' => [
            'name',
            'parentId',
        ],
    ],

    'customer' => [
        'url' => '/api/customers',
        'filters' => [
            'xl_id',
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
            'syncedAfter',
        ],
        'includes' => [
            'operator',
        ],
        'sorts' => [
            'name',
            'country',
            'voivodeship',
            'operatorId',
        ],
    ],

    'branch' => [
        'url' => '/api/branches',
        'filters' => [
            'xl_id',
            'name',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter',
        ],
        'includes' => [
            'operators',
        ],
        'sorts' => [
            'name',
        ],
    ],

    'operator' => [
        'url' => '/api/operators',
        'filters' => [
            'xl_id',
            'name',
            'xlUsername',
            'email',
            'operatorRoleId',
            'xlId',
            'syncedBefore',
            'syncedBetween',
            'syncedAfter',
        ],
        'includes' => [
            'role',
            'customers',
            'branches',
        ],
        'sorts' => [
            'name',
            'email',
            'xlUsername',
        ],
    ],

    'operator_role' => [
        'url' => '/api/operator_roles',
        'filters' => [
            'xl_id',
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
        'url' => '/api/languages',
        'filters' => [
            'xl_id',
            'name',
        ],
        'includes' => [],
        'sorts' => [
            'name',
        ],
    ],

    'description' => [
        'url' => '/api/descriptions',
        'filters' => [
            'xl_id',
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
            'syncedAfter',
        ],
        'includes' => [
            'product',
            'language',
        ],
        'sorts' => [
            'name',
            'languageId',
        ],
    ],

    'warehouse' => [
        'url' => '/api/warehouses',
        'filters' => [
            'xl_id',
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
            'syncedAfter',
        ],
        'includes' => [
            'customer',
            'operator',
            'stocks',
        ],
        'sorts' => [
            'name',
            'internal',
            'country',
            'locked',
            'stockCounting',
            'lastModification',
        ],
    ],

    'stock' => [
        'url' => '/api/stocks',
        'filters' => [
            'xl_id',
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
            'syncedAfter',
        ],
        'includes' => [
            'product',
            'warehouse',
        ],
        'sorts' => [
            'productId',
            'warehouseId',
            'receptionDate',
        ],
    ],

    'order' => [
        'url' => '/api/orders',
        'filters' => [
            'xl_id',
            'orderNumber',
            'warehouseId',
            'operatorId',
            'customerId',
            'receiveStatus',
            'isNull',
            'notNull',
        ],
        'includes' => [
            'product',
            'operator',
            'customer',
        ],
        'sorts' => [
            'productId',
            'warehouseId',
            'customerId',
            'sendingStatus',
        ],
    ],

    'order_element' => [
        'url' => '/api/order_elements',
        'filters' => [
            'xl_id',
            'orderId',
            'productId',
            'warehouseId',
            'amountLower',
            'amountGreater',
            'sentAtBefore',
            'sentAtBetween',
            'sentAtAfter',
            'isNull',
            'notNull',
        ],
        'includes' => [
            'order',
            'product',
            'warehouse',
        ],
        'sorts' => [
            'xlId',
            'orderId',
        ],
    ],
];
