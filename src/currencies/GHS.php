<?php namespace browner12\money\currencies;

class GHS extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'GHS';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Ghana Cedi';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 936;

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
