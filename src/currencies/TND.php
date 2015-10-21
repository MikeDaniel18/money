<?php namespace browner12\money\currencies;

class TND extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'TND';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Tunisian Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 788;

    /**
     * subunit
     *
     * @var int
     */
    const SUBUNIT = 1000;

    /**
     * precision
     *
     * @const integer
     */
    const PRECISION = 3;

}
