<?php namespace browner12\money\currencies;

class LSL extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'LSL';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Loti';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 426;

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
