<?php namespace browner12\money\currencies;

class IQD extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'IQD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Iraqi Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 368;

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
