<?php namespace browner12\money\currencies;

class AUD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'AUD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Australian Dollar';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 36;

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
