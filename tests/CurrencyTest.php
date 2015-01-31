<?php namespace browner12\money\tests;

use browner12\money\currencies\USD;

class CurrencyTest extends \PHPUnit_Framework_TestCase {

    /**
     * currency returns correct values
     */
    public function testCurrencyReturnsCorrectValues(){

        //get currency
        $currency = new USD();

        //test
        $this->assertSame('USD', $currency->currency());
        $this->assertSame('US Dollar', $currency->name());
        $this->assertSame(840, $currency->code());
        $this->assertSame(100, $currency->subunit());
        $this->assertSame(2, $currency->precision());
        $this->assertSame('USD (US Dollar)', $currency->__toString());
    }

}
