<?php namespace browner12\money\currencies;

class SAR extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'SAR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Saudi Riyal';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 682;

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
