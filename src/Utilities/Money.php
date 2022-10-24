<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Utilities
 */

namespace Jtl\Connector\Core\Utilities;

class Money
{
    /**
     * @param $net
     * @param $vat
     *
     * @return float|int|mixed
     */
    public static function gross($net, $vat)
    {
        $vat = (float)$vat;
        if ($vat <= 0) {
            return $net;
        }

        return $net * ($vat / 100 + 1);
    }

    /**
     * @param $gross
     * @param $vat
     *
     * @return float|mixed
     */
    public static function net($gross, $vat)
    {
        $vat = (float)$vat;
        if ($vat <= 0) {
            return $gross;
        }

        return $gross / ($vat / 100 + 1);
    }

    /**
     * @deprecated since 5.2 use Money::gross() instead.
     * @param $net
     * @param $vat
     *
     * @return float|int|mixed
     */
    //phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public static function AsGross($net, $vat)
    {
        return self::gross($net, $vat);
    }

    /**
     * @deprecated since 5.2 use Money::net() instead.
     * @param $gross
     * @param $vat
     *
     * @return float|int|mixed
     */
    //phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public static function AsNet($gross, $vat)
    {
        return self::net($gross, $vat);
    }
}
