<?php namespace browner12\money\currencies;

class RUB extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'RUB';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Russian Ruble';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 643;

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
