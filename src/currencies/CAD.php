<?php namespace browner12\money\currencies;

class CAD extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'CAD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Canadian Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 124;

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
