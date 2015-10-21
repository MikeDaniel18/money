<?php namespace browner12\money\currencies;

class XOF extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'XOF';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'CFA Franc BCEAO';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 952;

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
