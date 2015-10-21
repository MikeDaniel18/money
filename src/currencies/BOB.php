<?php namespace browner12\money\currencies;

class BOB extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BOB';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Boliviano';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 68;

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
