<?php namespace browner12\money\currencies;

class BND extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BND';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Brunei Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 96;

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
