<?php namespace browner12\money\currencies;

class ETB extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ETB';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Ethiopian Birr';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 230;

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
