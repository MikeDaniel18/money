<?php namespace browner12\money\currencies;

class MZN extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'MZN';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Mozambique Metical';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 943;

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
