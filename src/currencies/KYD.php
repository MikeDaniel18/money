<?php namespace browner12\money\currencies;

class KYD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'KYD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Cayman Islands Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 136;

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
