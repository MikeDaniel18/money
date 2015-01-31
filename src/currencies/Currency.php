<?php namespace browner12\money\currencies;

abstract class Currency {

	/**
	 * constructor
	 */
	public function __construct(){}

	/**
	 * get currency
	 *
	 * @return string
	 */
	public function currency(){
		return static::CURRENCY;
	}
	
	/**
	 * get name
	 *
	 * @return string
	 */
	public function name(){
		return static::NAME;
	}
	
	/**
	 * get iso code
	 *
	 * @return int
	 */
	public function code(){
		return static::CODE;
	}

	/**
	 * get subunit value
	 *
	 * @return int
	 */
	public function subunit(){
		return static::SUBUNIT;
	}
	
	/**
	 * get precision
	 *
	 * @return int
	 */
	public function precision(){
		return static::PRECISION;
	}
	
	/**
	 * to string magic method
	 *
	 * @return string
	 */
	public function __toString(){
		return static::CURRENCY . ' (' . static::NAME . ')';
	}
}