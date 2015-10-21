<?php namespace browner12\money\currencies;

class XFU extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'XFU';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'UIC-Franc';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 958;

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
    const PRECISION = 0;

}
