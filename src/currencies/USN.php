<?php namespace browner12\money\currencies;

class USN extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'USN';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'US Dollar (Next day)';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 997;

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
