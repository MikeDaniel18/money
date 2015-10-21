<?php namespace browner12\money\currencies;

class DZD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'DZD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Algerian Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 12;

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
