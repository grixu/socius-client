<?php

namespace Grixu\SociusClient;

/**
 * Class Socius
 * @package App\Socius
 */
class SociusClient
{
    public function product()
    {
        return new SociusQuery(SociusDomainEnum::PRODUCT());
    }

    public function productType()
    {
        return new SociusQuery(SociusDomainEnum::PRODUCT_TYPE());
    }

    public function brand()
    {
        return new SociusQuery(SociusDomainEnum::BRAND());
    }

    public function category()
    {
        return new SociusQuery(SociusDomainEnum::CATEGORY());
    }

    public function description()
    {
        return new SociusQuery(SociusDomainEnum::DESCRIPTION());
    }

    public function language()
    {
        return new SociusQuery(SociusDomainEnum::LANGUAGE());
    }

    public function warehouse()
    {
        return new SociusQuery(SociusDomainEnum::WAREHOUSE());
    }

    public function stock()
    {
        return new SociusQuery(SociusDomainEnum::STOCK());
    }

    public function operator()
    {
        return new SociusQuery(SociusDomainEnum::OPERATOR());
    }

    public function operatorRole()
    {
        return new SociusQuery(SociusDomainEnum::OPERATOR_ROLE());
    }

    public function branch()
    {
        return new SociusQuery(SociusDomainEnum::BRANCH());
    }

    public function customer()
    {
        return new SociusQuery(SociusDomainEnum::CUSTOMER());
    }
}
