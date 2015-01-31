<?php namespace browner12\money\currencies;

class CZK extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'CZK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Czech Koruna';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 203;

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
