<?php namespace browner12\money\currencies;

class LRD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'LRD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Liberian Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 430;

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
