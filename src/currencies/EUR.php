<?php namespace browner12\money\currencies;

class EUR extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'EUR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Euro';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 978;

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
