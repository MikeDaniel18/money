<?php namespace browner12\money\currencies;

class XAU extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'XAU';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Gold';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 959;

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
    const PRECISION = 0;

}
