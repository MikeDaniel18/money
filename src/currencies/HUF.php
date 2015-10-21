<?php namespace browner12\money\currencies;

class HUF extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'HUF';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Forint';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 348;

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
