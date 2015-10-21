<?php namespace browner12\money\currencies;

class BDT extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BDT';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Taka';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 50;

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
