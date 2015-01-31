<?php namespace browner12\money\currencies;

class OMR extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'OMR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Rial Omani';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 512;

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
