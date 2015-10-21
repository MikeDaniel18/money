<?php namespace browner12\money\currencies;

class PLN extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'PLN';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Zloty';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 985;

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
