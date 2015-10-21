<?php namespace browner12\money\currencies;

class DOP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'DOP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Dominican Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 214;

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
