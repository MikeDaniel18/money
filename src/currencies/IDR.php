<?php namespace browner12\money\currencies;

class IDR extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'IDR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Rupiah';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 360;

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
