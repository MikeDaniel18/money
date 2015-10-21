<?php namespace browner12\money\currencies;

class LYD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'LYD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Libyan Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 434;

    /**
     * subunit
     *
     * @var int
     */
    const SUBUNIT = 1000;

    /**
     * precision
     *
     * @const integer
     */
    const PRECISION = 3;

}
