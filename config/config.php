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
            'brand_id',
            'product_type_id',
            'blocked',
            'archived',
            'eshop',
            'availability',
            'price_lower',
            'price_greater',
            'synced_before',
            'synced_between',
            'synced_after',
            'is_null',
            'not_null',
        ],
        'includes' => [
            'brand',
            'productType',
            'stocks',
            'descriptions',
            'attachments',
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
            'parent_id',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [
            'children',
            'parent',
        ],
        'sorts' => [
            'name',
            'parent_id',
        ],
    ],

    'attachment' => [
        'url' => '/api/attachments',
        'filters' => [
            'xl_id',
            'filename',
            'product_id',
            'language_id',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [
            'product',
            'language',
        ],
        'sorts' => [
            'filename',
            'updated_at',
            'type',
        ],
    ],

    'customer' => [
        'url' => '/api/customers',
        'filters' => [
            'xl_id',
            'name',
            'country',
            'postal_code',
            'city',
            'vat_number',
            'street',
            'voivodeship',
            'district',
            'phone1',
            'phone2',
            'email',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [],
        'sorts' => [
            'name',
            'country',
            'voivodeship',
        ],
    ],

    'branch' => [
        'url' => '/api/branches',
        'filters' => [
            'xl_id',
            'name',
            'synced_before',
            'synced_between',
            'synced_after',
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
            'xl_username',
            'email',
            'operator_role_id',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [
            'role',
            'branches',
        ],
        'sorts' => [
            'name',
            'email',
            'xl_username',
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
            'page_title',
            'keywords',
            'meta_desc',
            'url',
            'last_modification',
            'last_modification_before',
            'last_modification_between',
            'last_modification_after',
            'last_modification_desc',
            'last_modification_desc_before',
            'last_modification_desc_between',
            'last_modification_desc_after',
            'synced_before',
            'synced_between',
            'synced_after',
            'is_null',
            'not_null',
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
            'country',
            'street',
            'city',
            'post_code',
            'type',
            'locked',
            'last_modification',
            'last_modification_before',
            'last_modification_between',
            'last_modification_after',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [
            'customer',
            'stocks',
        ],
        'sorts' => [
            'name',
            'country',
            'street',
            'city',
            'post_code',
            'locked',
            'type',
            'last_modification',
        ],
    ],

    'stock' => [
        'url' => '/api/stocks',
        'filters' => [
            'xl_id',
            'amount_greater',
            'amount_lower',
            'product_id',
            'warehouse_id',
            'reception',
            'reception_before',
            'reception_between',
            'reception_after',
            'synced_before',
            'synced_between',
            'synced_after',
        ],
        'includes' => [
            'product',
            'warehouse',
        ],
        'sorts' => [
            'product_id',
            'warehouse_id',
            'reception_date',
        ],
    ],

    'order' => [
        'url' => '/api/orders',
        'filters' => [
            'xl_id',
            'order_number',
            'warehouse_id',
            'operator_id',
            'customer_id',
            'receive_status',
            'is_null',
            'not_null',
        ],
        'includes' => [
            'warehouse',
            'operator',
            'customer',
        ],
        'sorts' => [
            'warehouse_id',
            'customer_id',
            'sending_status',
        ],
    ],

    'order_element' => [
        'url' => '/api/order_elements',
        'filters' => [
            'xl_id',
            'order_id',
            'product_id',
            'warehouse_id',
            'amount_lower',
            'amount_greater',
            'received_at_before',
            'received_at_between',
            'received_at_after',
            'is_null',
            'not_null',
        ],
        'includes' => [
            'order',
            'product',
            'warehouse',
        ],
        'sorts' => [
            'xl_id',
            'order_id',
            'product_id',
            'warehouse_id',
        ],
    ],
];
