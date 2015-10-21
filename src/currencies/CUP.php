<?php namespace browner12\money\currencies;

class CUP extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'CUP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Cuban Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 192;

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
