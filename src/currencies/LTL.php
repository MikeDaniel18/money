<?php namespace browner12\money\currencies;

class LTL extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'LTL';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Lithuanian Litas';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 440;

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
