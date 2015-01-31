<?php namespace browner12\money\currencies;

class PGK extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'PGK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Kina';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 598;

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
