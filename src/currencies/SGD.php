<?php namespace browner12\money\currencies;

class SGD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'SGD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Singapore Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 702;

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
