<?php namespace browner12\money\currencies;

class THB extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'THB';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Baht';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 764;

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
