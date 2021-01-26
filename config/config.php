<?php

use Grixu\SociusClient\Customer\Actions\ConvertToCustomerDataAction;
use Grixu\SociusClient\Customer\Enums\CustomerFiltersEnum;
use Grixu\SociusClient\Customer\Enums\CustomerIncludesEnum;
use Grixu\SociusClient\Customer\Enums\CustomerSortsEnum;
use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Description\Actions\ConvertToLanguageDataAction;
use Grixu\SociusClient\Description\Enums\DescriptionFiltersEnum;
use Grixu\SociusClient\Description\Enums\DescriptionIncludesEnum;
use Grixu\SociusClient\Description\Enums\DescriptionSortsEnum;
use Grixu\SociusClient\Description\Enums\LanguageFiltersEnum;
use Grixu\SociusClient\Description\Enums\LanguageSortsEnum;
use Grixu\SociusClient\Operator\Actions\ConvertToBranchDataAction;
use Grixu\SociusClient\Operator\Actions\ConvertToOperatorDataAction;
use Grixu\SociusClient\Operator\Actions\ConvertToOperatorRoleDataAction;
use Grixu\SociusClient\Operator\Enums\BranchFiltersEnum;
use Grixu\SociusClient\Operator\Enums\BranchSortsEnum;
use Grixu\SociusClient\Operator\Enums\OperatorFiltersEnum;
use Grixu\SociusClient\Operator\Enums\OperatorIncludesEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleFiltersEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleIncludesEnum;
use Grixu\SociusClient\Operator\Enums\OperatorRoleSortsEnum;
use Grixu\SociusClient\Operator\Enums\OperatorSortsEnum;
use Grixu\SociusClient\Product\Actions\ConvertToBrandDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToCategoryDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToProductDataAction;
use Grixu\SociusClient\Product\Actions\ConvertToProductTypeDataAction;
use Grixu\SociusClient\Product\Enums\BrandFiltersEnum;
use Grixu\SociusClient\Product\Enums\BrandIncludesEnum;
use Grixu\SociusClient\Product\Enums\BrandSortsEnum;
use Grixu\SociusClient\Product\Enums\CategoryFiltersEnum;
use Grixu\SociusClient\Product\Enums\CategoryIncludesEnum;
use Grixu\SociusClient\Product\Enums\CategorySortsEnum;
use Grixu\SociusClient\Product\Enums\ProductFiltersEnum;
use Grixu\SociusClient\Product\Enums\ProductIncludesEnum;
use Grixu\SociusClient\Product\Enums\ProductSortsEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeFiltersEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeIncludesEnum;
use Grixu\SociusClient\Product\Enums\ProductTypeSortsEnum;
use Grixu\SociusClient\Warehouse\Actions\ConvertToStockDataAction;
use Grixu\SociusClient\Warehouse\Actions\ConvertToWarehouseDataAction;
use Grixu\SociusClient\Warehouse\Enums\StockFiltersEnum;
use Grixu\SociusClient\Warehouse\Enums\StockIncludesEnum;
use Grixu\SociusClient\Warehouse\Enums\StockSortsEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseFiltersEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseIncludesEnum;
use Grixu\SociusClient\Warehouse\Enums\WarehouseSortsEnum;

return [
    'api' => [
        env('SOCIUS_BASE_URL'),
        env('SOCIUS_OAUTH'),
        env('SOCIUS_CLIENT_ID'),
        env('SOCIUS_CLIENT_KEY'),
        'socius-client',
    ],

    'allowed_filters' => [
        ProductTypeFiltersEnum::class,
        ProductFiltersEnum::class,
        BrandFiltersEnum::class,
        CategoryFiltersEnum::class,
        CustomerFiltersEnum::class,
        DescriptionFiltersEnum::class,
        LanguageFiltersEnum::class,
        OperatorFiltersEnum::class,
        OperatorRoleFiltersEnum::class,
        BranchFiltersEnum::class,
        WarehouseFiltersEnum::class,
        StockFiltersEnum::class
    ],

    'allowed_sorts' => [
        ProductTypeSortsEnum::class,
        ProductSortsEnum::class,
        BrandSortsEnum::class,
        CategorySortsEnum::class,
        CustomerSortsEnum::class,
        DescriptionSortsEnum::class,
        LanguageSortsEnum::class,
        OperatorSortsEnum::class,
        OperatorRoleSortsEnum::class,
        BranchSortsEnum::class,
        WarehouseSortsEnum::class,
        StockSortsEnum::class
    ],

    'allowed_includes' => [
        ProductTypeIncludesEnum::class,
        ProductIncludesEnum::class,
        BrandIncludesEnum::class,
        CategoryIncludesEnum::class,
        CustomerIncludesEnum::class,
        DescriptionIncludesEnum::class,
        OperatorIncludesEnum::class,
        OperatorRoleIncludesEnum::class,
        BranchSortsEnum::class,
        WarehouseIncludesEnum::class,
        StockIncludesEnum::class
    ],

    'allowed_parsers' => [
        ConvertToProductTypeDataAction::class,
        ConvertToProductDataAction::class,
        ConvertToBrandDataAction::class,
        ConvertToCategoryDataAction::class,
        ConvertToCustomerDataAction::class,
        ConvertToDescriptionDataAction::class,
        ConvertToLanguageDataAction::class,
        ConvertToOperatorDataAction::class,
        ConvertToOperatorRoleDataAction::class,
        ConvertToBranchDataAction::class,
        ConvertToWarehouseDataAction::class,
        ConvertToStockDataAction::class
    ],

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
