<?php namespace browner12\money\currencies;

class USS extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'USS';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'US Dollar (Same day)';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 998;

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
