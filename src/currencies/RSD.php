<?php namespace browner12\money\currencies;

class RSD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'RSD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Serbian Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 941;

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
