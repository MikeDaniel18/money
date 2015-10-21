<?php namespace browner12\money\currencies;

class ZWL extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ZWL';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Zimbabwe Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 932;

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
