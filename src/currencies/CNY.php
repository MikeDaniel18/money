<?php namespace browner12\money\currencies;

class CNY extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'CNY';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Yuan Renminbi';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 156;

    /**
     * subunit
     *
     * @var int
     */
    const SUBUNIT = 100;

    /**
     * precision
     *
     * @const integer
     */
    const PRECISION = 2;

}
