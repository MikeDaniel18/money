<?php namespace browner12\money\currencies;

class XDR extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'XDR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'SDR (Special Drawing Right)';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 960;

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
    const PRECISION = 0;

}
