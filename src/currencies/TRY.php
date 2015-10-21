<?php namespace browner12\money\currencies;

class TRY extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'TRY';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Turkish Lira';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 949;

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
