<?php namespace browner12\money\currencies;

class ALL extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ALL';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Lek';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 8;

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
