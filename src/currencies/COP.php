<?php namespace browner12\money\currencies;

class COP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'COP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Colombian Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 170;

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
