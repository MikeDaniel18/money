<?php namespace browner12\money\currencies;

class INR extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'INR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Indian Rupee';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 356;

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
