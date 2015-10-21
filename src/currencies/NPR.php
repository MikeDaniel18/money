<?php namespace browner12\money\currencies;

class NPR extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'NPR';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Nepalese Rupee';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 524;

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
