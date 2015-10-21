<?php namespace browner12\money\currencies;

class SEK extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'SEK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Swedish Krona';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 752;

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
