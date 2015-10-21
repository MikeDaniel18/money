<?php namespace browner12\money\currencies;

class HKD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'HKD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Hong Kong Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 344;

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
