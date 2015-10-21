<?php namespace browner12\money\currencies;

class LBP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'LBP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Lebanese Pound';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 422;

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
