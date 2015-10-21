<?php namespace browner12\money\currencies;

class PHP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'PHP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Philippine Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 608;

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
