<?php namespace browner12\money\currencies;

class BHD extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'BHD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Bahraini Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 48;

    /**
     * subunit
     *
     * @var int
     */
    const SUBUNIT = 1000;

    /**
     * precision
     *
     * @const integer
     */
    const PRECISION = 3;

}
