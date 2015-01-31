<?php namespace browner12\money;

use browner12\money\exceptions\MoneyException;
use JsonSerializable;
use NumberFormatter;

class Money implements JsonSerializable {

	/**
	 * value in smallest unit
	 *
	 * @var int
	 */
	private $value;

	/**
	 * currency
	 *
	 * @var \browner12\money\currencies\Currency
	 */
	private $currency;

	/**
	 * constructor
	 *
	 * @param int $value
	 * @param string $currency
	 */
	public function __construct($value, $currency = 'usd'){

		//set currency
		$this->setCurrency($currency);

		//set value
		$this->setValue($value);
	}

	/**
	 * get value
	 *
	 * @return float
	 */
	public function value(){
		return round($this->value / $this->currency->subunit(), $this->currency->precision());
	}

	/**
	 * get subunit value
	 *
	 * @return int
	 */
	public function subunits(){
		return $this->value;
	}

	/**
	 * get the value formatted according to the locale
	 *
	 * @param string $locale
	 * @return string
	 */
	public function format($locale = 'en_US'){

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
	public function getCurrency(){
		return $this->currency;
	}

	/**
	 * @param int $value
	 * @throws \browner12\money\exceptions\MoneyException
	 */
	private function setValue($value){

		echo $value;

		//check in bounds
		$this->isInsideIntegerBounds($value);

		//value is integer, simply assign
		if(is_int($value)){
			$this->value = $value;
		}

		//value is float, convert and assign
		elseif(is_float($value)){
			$this->value = (int) round($value / $this->currency->subunit(), 0);
		}

		//value is an integer string
		elseif(preg_match('/^[0-9]+$/', $value)){
			$this->value = (int) $value;
		}

		//value is a float string
		elseif(preg_match('/^[0-9]+(\.[0-9]+)?$/', $value)){
			$this->value = (int) round($value / $this->currency->subunit(), 0);
		}

		//problem
		else{
			throw new MoneyException('The value was not numeric.');
		}
	}

	/**
	 * currency is passed as a string, and we will handle instantiating the specific currency class
	 *
	 * @param $currency
	 * @throws \browner12\money\exceptions\MoneyException
	 */
	private function setCurrency($currency){

		//currency class
		$currencyClass = '\\browner12\\money\\currencies\\' . strtoupper($currency);

		//check class exists
		if(!class_exists($currencyClass)){
			throw new MoneyException('This currency does not exist.');
		}

		//assign currency
		$this->currency = new $currencyClass();
	}

	/**
	 * check that value is inside integer bounds
	 *
	 * @param integer $value
	 * @return bool
	 * @throws \browner12\money\exceptions\MoneyException
	 */
	private function isInsideIntegerBounds($value){

		//outside of bounds
		if(abs($value) > PHP_INT_MAX){
			throw new MoneyException('Value is outside of PHP Integer Max.');
		}

		//inside of bounds
		return true;
	}

	/**
	 * to json method
	 *
	 * @return array
	 */
	public function jsonSerialize(){

		return [
			'amount' => $this->value(),
			'currency' => $this->currency->currency(),
		];
	}

	/**
	 * to string magic method
	 *
	 * @return string
	 */
	public function __toString(){
		return $this->format();
	}

}
