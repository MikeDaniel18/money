<?php namespace browner12\money\currencies;

class NZD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'NZD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'New Zealand Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 554;

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
