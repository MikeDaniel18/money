<?php namespace browner12\money;

use browner12\money\exceptions\MoneyException;
use JsonSerializable;
use NumberFormatter;

class Money implements JsonSerializable
{
    /**
     * subunits
     *
     * @var int
     */
    private $subunits;

    /**
     * currency
     *
     * @var \browner12\money\currencies\Currency
     */
    private $currency;

    /**
     * constructor
     *
     * @param int    $value
     * @param string $currency
     * @param bool   $convert
     * @throws \browner12\money\exceptions\MoneyException
     */
    public function __construct($value, $currency = 'usd', $convert = false)
    {
        //set currency
        $this->setCurrency($currency);

        //set value
        $this->setValue($value, $convert);
    }

    /**
     * get value
     *
     * this is a float value in the base unit of the currency
     *
     * @return float
     */
    public function value()
    {
        return round($this->subunits / $this->currency->subunit(), $this->currency->precision());
    }

    /**
     * get subunit value
     *
     * this is an integer value in the sub unit of the currency
     *
     * @return int
     */
    public function subunits()
    {
        return $this->subunits;
    }

    /**
     * get the value formatted according to the locale
     *
     * @param string $locale
     * @return string
     */
    public function format($locale = 'en_US')
    {
        //create international formatter
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

        //return
        return $formatter->formatCurrency($this->value(), $this->currency->currency());
    }

    /**
     * get currency
     *
     * @return \browner12\money\currencies\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * set the value of the money object
     *
     * we will assumed the value is passed to us in the subunit value i.e. USDs will be passed as cents
     * if the user wants us to try and convert from the base unit (USD), we will.
     *
     * @param int  $value
     * @param bool $convert
     * @throws \browner12\money\exceptions\MoneyException
     */
    private function setValue($value, $convert = false)
    {
        //check in bounds
        $this->isInsideIntegerBounds($value);

        //value is integer, simply assign
        if (is_int($value)) {
            $this->subunits = ($convert) ? $value * $this->currency->subunit() : $value;
        }

        //value is float, convert and assign
        elseif (is_float($value)) {

            //convert
            $value = ($convert) ? $value * $this->currency->subunit() : $value;

            //set
            $this->subunits = (int)round($value, 0);
        }

        //value is an integer string
        elseif (preg_match('/^[0-9]+$/', $value)) {

            //cast
            $value = (int)$value;

            //assign
            $this->subunits = ($convert) ? $value * $this->currency->subunit() : $value;
        }

        //value is a float string
        elseif (preg_match('/^[0-9]+(\.[0-9]+)?$/', $value)) {

            //cast
            $value = (float)$value;

            //convert
            $value = ($convert) ? $value * $this->currency->subunit() : $value;

            //assign
            $this->subunits = (int)round($value, 0);
        }

        //problem
        else {
            throw new MoneyException('The value "' . $value . '" was not numeric.');
        }
    }

    /**
     * currency is passed as a string, and we will handle instantiating the specific currency class
     *
     * @param $currency
     * @throws \browner12\money\exceptions\MoneyException
     */
    private function setCurrency($currency)
    {
        //currency class
        $currencyClass = '\\browner12\\money\\currencies\\' . strtoupper($currency);

        //check class exists
        if (!class_exists($currencyClass)) {
            throw new MoneyException('The currency "' . $currency . '" does not exist.');
        }

        //assign currency
        $this->currency = new $currencyClass();
    }

    /**
     * check that value is inside integer bounds
     *
     * this seems to be difficult/impossible to test for, since integers above the bounds
     * are converted to floats internally. the float is not evaluating greater than the
     * PHP_INT_MAX. it is however evaluating equal to. therefore we'll test >= for now
     * and just miss out on that 1 extra integer
     *
     * @param integer $value
     * @return bool
     * @throws \browner12\money\exceptions\MoneyException
     */
    private function isInsideIntegerBounds($value)
    {
        //outside of bounds
        if (abs($value) >= PHP_INT_MAX) {
            throw new MoneyException('Value is outside of PHP integer bounds.');
        }

        //inside of bounds
        return true;
    }

    /**
     * to json method
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'value'    => $this->value(),
            'subunits' => $this->subunits(),
            'currency' => $this->currency->currency(),
        ];
    }

    /**
     * to string magic method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format();
    }

}
