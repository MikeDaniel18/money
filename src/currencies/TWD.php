<?php namespace browner12\money\currencies;

class TWD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'TWD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'New Taiwan Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 901;

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
