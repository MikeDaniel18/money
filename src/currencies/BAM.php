<?php namespace browner12\money\currencies;

class BAM extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BAM';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Convertible Mark';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 977;

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
