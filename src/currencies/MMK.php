<?php namespace browner12\money\currencies;

class MMK extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'MMK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Kyat';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 104;

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
