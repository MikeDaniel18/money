<?php namespace browner12\money\currencies;

class ARS extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ARS';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Argentine Peso';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 32;

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
