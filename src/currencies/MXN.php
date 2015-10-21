<?php namespace browner12\money\currencies;

class MXN extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'MXN';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Mexican Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 484;

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
