<?php namespace browner12\money\currencies;

class MYR extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'MYR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Malaysian Ringgit';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 458;

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
