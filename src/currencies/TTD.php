<?php namespace browner12\money\currencies;

class TTD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'TTD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Trinidad and Tobago Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 780;

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
