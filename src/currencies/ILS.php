<?php namespace browner12\money\currencies;

class ILS extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ILS';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'New Israeli Sheqel';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 376;

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
