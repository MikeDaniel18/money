<?php namespace browner12\money\currencies;

class DKK extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'DKK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Danish Krone';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 208;

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
