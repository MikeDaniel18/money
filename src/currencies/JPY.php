<?php namespace browner12\money\currencies;

class JPY extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'JPY';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Yen';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 392;

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
    const PRECISION = 0;

}
