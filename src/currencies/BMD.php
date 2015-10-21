<?php namespace browner12\money\currencies;

class BMD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BMD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Bermudian Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 60;

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
