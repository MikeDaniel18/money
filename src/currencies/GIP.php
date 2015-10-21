<?php namespace browner12\money\currencies;

class GIP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'GIP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Gibraltar Pound';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 292;

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
