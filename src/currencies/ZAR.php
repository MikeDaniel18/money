<?php namespace browner12\money\currencies;

class ZAR extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ZAR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Rand';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 710;

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
