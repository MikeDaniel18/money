<?php namespace browner12\money\currencies;

class CUC extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'CUC';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Peso Convertible';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 931;

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
