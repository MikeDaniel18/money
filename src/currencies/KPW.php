<?php namespace browner12\money\currencies;

class KPW extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'KPW';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'North Korean Won';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 408;

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
