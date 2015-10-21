<?php namespace browner12\money\currencies;

class USD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'USD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'US Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 840;

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
