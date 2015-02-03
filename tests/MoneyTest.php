<?php namespace browner12\money\tests;

use browner12\money\Money;
use browner12\money\exceptions\MoneyException;

class MoneyTest extends \PHPUnit_Framework_TestCase {

    /**
     * valid values
     */
    const VALID_VALUE = 1000;
    const VALID_CURRENCY = 'USD';
    const VALID_LOCALE = 'en_US';

    /**
     * invalid values
     */
    const INVALID_VALUE = 'invalidValue';
    const INVALID_CURRENCY = 'invalidCurrency';
    const INVALID_LOCALE = 'invalidLocale';

    /**
     * test money return base unit value
     */
    public function testMoneyReturnsBaseUnitValue()
    {
        $money = new Money(self::VALID_VALUE, self::VALID_CURRENCY);

        $this->assertEquals(self::VALID_VALUE, $money->subunits());
    }

    /**
     * test invalid currency throws an exception
     */
    public function testInvalidCurrencyThrowsException(){

        try{
            new Money(self::VALID_VALUE, self::INVALID_CURRENCY);
        }
        catch(MoneyException $e){
            return;
        }

        $this->fail('An expected MoneyException was not thrown for an invalid currency.');
    }

    /**
     * test invalid value throws an exception
     */
    public function testInvalidValueThrowsException(){

        try{
            new Money(self::INVALID_VALUE, self::VALID_CURRENCY);
        }
        catch(MoneyException $e){
            return;
        }

        $this->fail('An expected MoneyException was not thrown for an invalid value.');
    }

    /**
     * test invalid locale throws an exceptions
     * there is no consistent way to get a list of valid locales to compare against,
     * so this test is being deactivated for now.
     */
    public function testInvalidLocaleThrowsException(){

        return;

        try{
            new Money(self::VALID_VALUE, self::VALID_CURRENCY, self::INVALID_LOCALE);
        }
        catch(MoneyException $e){
            return;
        }

        $this->fail('An expected MoneyException was not thrown for an invalid locale.');
    }

    /**
     * format displays correctly
     */
    public function testFormatterDisplaysCorrectly(){

        //create money
        $money = new Money(1000, 'usd');

        //tests
        $this->assertSame('$10.00', $money->format('en-US'));
        $this->assertSame('US$10.00', $money->format('en-CA'));
        $this->assertSame('$10.00', $money->format('ja-JP'));
    }

    /**
     * sets integer value correctly
     */
    public function testSetsIntegerValueCorrectly(){

        //create money
        $money = new Money(123, 'usd');

        //test
        $this->assertSame(123, $money->subunits(), 'Money is not setting integer values correctly.');
    }

    /**
     * sets float value correctly
     */
    public function testSetsFloatValueCorrectly(){

        //create money
        $money = new Money(123.4, 'usd');
        $money2 = new Money(123.5, 'usd');
        $money3 = new Money(123.6, 'usd');

        //message
        $message = 'Money is not setting float values correctly.';

        //test
        $this->assertSame(123, $money->subunits(), $message);
        $this->assertSame(124, $money2->subunits(), $message);
        $this->assertSame(124, $money3->subunits(), $message);
    }

    /**
     * sets string integer value correctly
     */
    public function testSetsStringIntegerValueCorrectly(){

        //create money
        $money = new Money('123', 'usd');

        //test
        $this->assertSame(123, $money->subunits(), 'Money is not setting string integer values correctly.');
    }

    /**
     * sets string float value correctly
     */
    public function testSetsStringFloatValueCorrectly(){

        //create money
        $money = new Money('123.4', 'usd');
        $money2 = new Money('123.5', 'usd');
        $money3 = new Money('123.6', 'usd');

        //message
        $message = 'Money is not setting string float values correctly.';

        //test
        $this->assertSame(123, $money->subunits(), $message);
        $this->assertSame(124, $money2->subunits(), $message);
        $this->assertSame(124, $money3->subunits(), $message);
    }

    /**
     * sets converted integer value correctly
     */
    public function testSetsConvertedIntegerValueCorrectly(){

        //setup
        $money = new Money(1234, 'usd', true);
        $money2 = new Money(1234, 'bhd', true);
        $money3 = new Money(1234, 'mga', true);

        //message
        $message = 'Money is not setting converted integers correctly.';

        //test
        $this->assertSame(123400, $money->subunits(), $message);
        $this->assertSame(1234000, $money2->subunits(), $message);
        $this->assertSame(6170, $money3->subunits(), $message);
    }

    /**
     * sets converted float value correctly
     */
    public function testSetsConvertedFloatValueCorrectly(){

        //setup
        $money = new Money(1234.5678, 'usd', true);
        $money2 = new Money(1234.5678, 'bhd', true);
        $money3 = new Money(1234.5678, 'mga', true);

        //message
        $message = 'Money is not setting converted floats correctly.';

        //test
        $this->assertSame(123457, $money->subunits(), $message);
        $this->assertSame(1234568, $money2->subunits(), $message);
        $this->assertSame(6173, $money3->subunits(), $message);
    }

    /**
     * sets converted string integer value correctly
     */
    public function testSetsConvertedStringIntegerValueCorrectly(){

        //setup
        $money = new Money('1234', 'usd', true);
        $money2 = new Money('1234', 'bhd', true);
        $money3 = new Money('1234', 'mga', true);

        //message
        $message = 'Money is not setting converted string integers correctly.';

        //test
        $this->assertSame(123400, $money->subunits(), $message);
        $this->assertSame(1234000, $money2->subunits(), $message);
        $this->assertSame(6170, $money3->subunits(), $message);
    }

    /**
     * sets converted string float value correctly
     */
    public function testSetsConvertedStringFloatValueCorrectly(){

        //setup
        $money = new Money('1234.567', 'usd', true);
        $money2 = new Money('1234.567', 'bhd', true);
        $money3 = new Money('1234.567', 'mga', true);

        //message
        $message = 'Money is not setting converted string floats correctly.';

        //test
        $this->assertSame(123457, $money->subunits(), $message);
        $this->assertSame(1234567, $money2->subunits(), $message);
        $this->assertSame(6173, $money3->subunits(), $message);

    }

    /**
     * money value is inside integer bounds
     */
    public function testsOutsideIntegerBounds(){

        try{
            new Money(9223372036854775808, 'usd');
        }

        catch(MoneyException $e){
            return;
        }

        $this->fail('Money is not throwing an error when an integer is out of bounds.');
    }

    /**
     * returns json correctly
     */
    public function testReturnJsonCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //expected value
        $expectedValue = [
            'value' => 12.34,
            'subunits' => 1234,
            'currency' => 'USD',
        ];

        //test
        $this->assertSame($expectedValue, $money->jsonSerialize(), 'Money is not serializing to JSON correctly.');
    }

    /**
     * to string value displays correctly
     */
    public function testToStringDisplaysCorrectly(){

        //create money
        $money = new Money(1000, 'usd');

        //test
        $this->assertSame('$10.00', $money->__toString(), 'Money is not converting to string correctly.');
    }
}
