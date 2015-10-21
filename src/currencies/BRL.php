<?php namespace browner12\money\currencies;

class BRL extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BRL';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Brazilian Real';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 986;

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
