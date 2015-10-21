<?php namespace browner12\money\currencies;

class AMD extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = 'AMD';

    /**
     * display name
     *
     * @const string
     */
    const NAME = 'Armenian Dram';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = 51;

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
