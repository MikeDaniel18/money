<?php namespace browner12\money\currencies;

class KES extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'KES';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Kenyan Shilling';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 404;

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
