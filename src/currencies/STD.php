<?php namespace browner12\money\currencies;

class STD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'STD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Dobra';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 678;

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
