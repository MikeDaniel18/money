<?php namespace browner12\money\currencies;

class NOK extends Currency {

    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'NOK';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Norwegian Krone';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 578;

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
