<?php namespace browner12\money\currencies;

class EGP extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'EGP';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Egyptian Pound';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 818;

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
