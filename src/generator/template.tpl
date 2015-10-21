<?php namespace browner12\money\currencies;

class {{$currency}} extends Currency
{
    /**
     * currency
     *
     * @const string
     */
    const CURRENCY = '{{$currency}}';

    /**
     * display name
     *
     * @const string
     */
    const NAME = '{{$name}}';

    /**
     * code, ISO 4217
     *
     * @const int
     */
    const CODE = {{$code}};

    /**
     * subunit
     *
     * @var int
     */
    const SUBUNIT = {{$subunit}};

    /**
     * precision
     *
     * @const integer
     */
    const PRECISION = {{$precision}};

}
