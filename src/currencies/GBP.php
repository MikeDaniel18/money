<?php namespace browner12\money\currencies;

class GBP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'GBP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Pound Sterling';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 826;

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
