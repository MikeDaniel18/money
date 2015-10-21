<?php namespace browner12\money\currencies;

class COU extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'COU';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Unidad de Valor Real';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 970;

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
