<?php namespace browner12\money\currencies;

class ZMW extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'ZMW';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Zambian Kwacha';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 967;

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
