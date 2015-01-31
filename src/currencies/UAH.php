<?php namespace browner12\money\currencies;

class UAH extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'UAH';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Hryvnia';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 980;

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
