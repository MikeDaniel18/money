<?php namespace browner12\money\currencies;

class PKR extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'PKR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Pakistan Rupee';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 586;

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
