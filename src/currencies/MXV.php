<?php namespace browner12\money\currencies;

class MXV extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'MXV';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Mexican Unidad de Inversion (UDI)';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 979;

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
