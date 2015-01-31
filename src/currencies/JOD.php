<?php namespace browner12\money\currencies;

class JOD extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'JOD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Jordanian Dinar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 400;

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
    const PRECISION = 3;

}
