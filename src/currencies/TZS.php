<?php namespace browner12\money\currencies;

class TZS extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'TZS';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Tanzanian Shilling';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 834;

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
