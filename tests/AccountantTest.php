<?php

namespace browner12\money\tests;

use browner12\money\Accountant;
use browner12\money\exceptions\MoneyException;
use browner12\money\Money;

class AccountantTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \browner12\money\Accountant
     */
    private $accountant;

    /**
     * constructor
     */
    public function __construct(){

        //parent
        parent::__construct();

        //assign
        $this->accountant = new Accountant();
    }

    /**
     * sums monies correctly
     */
    public function testSumsMoniesCorrectly(){

        //create monies
        $monies = [
            new Money(23, 'usd'),
            new Money(1963, 'usd'),
            new Money(2, 'usd'),
            new Money(344, 'usd'),
            new Money(4234, 'usd'),
            new Money(123, 'usd'),
        ];

        //sum them
        $total = $this->accountant->sum($monies);

        //test
        $this->assertSame(6689, $total->subunits(), 'Accountant is not summing monies correctly.');
    }

    /**
     * adds monies correctly
     */
    public function testAddsTwoMoniesCorrectly(){

        //create monies
        $money1 = new Money(1234, 'usd');
        $money2 = new Money(2345, 'usd');

        //calculate total
        $total = $this->accountant->add($money1, $money2);

        //test
        $this->assertSame(3579, $total->subunits(), 'Accountant is not adding monies correctly.');
    }

    /**
     * subtracts monies correctly
     */
    public function testSubtractsTwoMoniesCorrectly(){

        //create monies
        $money1 = new Money(1234, 'usd');
        $money2 = new Money(2345, 'usd');

        //subtract
        $total1 = $this->accountant->subtract($money1, $money2);
        $total2 = $this->accountant->subtract($money2, $money1);

        //test
        $this->assertSame(-1111, $total1->subunits(), 'Accountant is not subtracting monies correctly.');
        $this->assertSame(1111, $total2->subunits(), 'Accountant is not subtracting monies correctly.');
    }

    /**
     * multiplies money correctly
     */
    public function testMultipliesMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //multiply
        $product = $this->accountant->multiply($money, 0.055);

        //test
        $this->assertSame(67.87, $product->subunits(), 'Accountant is not multiplying money correctly.');
    }

    /**
     * discounts money correctly
     */
    public function testDiscountsMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //discount
        $discount = $this->accountant->discount($money, 10);

        //test
        $this->assertSame(1111.6, $discount->subunits());
    }

    /**
     * negates money correctly
     */
    public function testNegatesMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //negate
        $newMoney = $this->accountant->negate($money);

        //test
        $this->assertSame(-1234, $newMoney->subunits(), 'Accountant is not negating money correctly.');
    }

    /**
     *
     */
    public function testCalculatesOrderTotalCorrectly(){
        return;
    }

    /**
     *
     */
    public function testCalculatesTaxCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //calculate tax
        $tax = $this->accountant->tax($money, 0.055);

        //
        $this->assertSame(68, $tax, 'Accountant is not calculating tax correctly.');
    }

    /**
     * allocates money correctly when the values are equal between all divisions
     */
    public function testAllocatesEvenMoneyCorrectly(){

        //create money
        $money = new Money(1500, 'usd');

        //allocate money
        $allocations = $this->accountant->allocate($money, 5);

        //message
        $message = 'Accountant is not allocating money correctly.';

        //correct number of allocations
        $this->assertSame(5, count($allocations), $message);

        //allocations are of correct value
        $this->assertSame(300, $allocations[0], $message);
        $this->assertSame(300, $allocations[1], $message);
        $this->assertSame(300, $allocations[2], $message);
        $this->assertSame(300, $allocations[3], $message);
        $this->assertSame(300, $allocations[4], $message);
    }

    /**
     * allocates money correctly when the values are not equal between all divisions
     */
    public function testAllocatesUnevenMoneyCorrectly(){

        //create money
        $money = new Money(1536, 'usd');

        //allocate money
        $allocations = $this->accountant->allocate($money, 7);

        //message
        $message = 'Accountant is not allocating money correctly.';

        //correct number of allocations
        $this->assertSame(7, count($allocations), $message);

        //allocations are of correct value
        $this->assertSame(220, $allocations[0], $message);
        $this->assertSame(220, $allocations[1], $message);
        $this->assertSame(220, $allocations[2], $message);
        $this->assertSame(219, $allocations[3], $message);
        $this->assertSame(219, $allocations[4], $message);
    }

    /**
     * exchanges money to new currency
     */
    public function testExchangesMoneyToNewCurrencyCorrectly(){

        //starting money
        $startingMoney = new Money(1000, 'usd');

        //actual new money
        $actualNewMoney = $this->accountant->exchange($startingMoney, 'eur', 1.23);

        //expected new money
        $expectedNewMoney = new Money(1230, 'eur');

        //test
        $this->assertEquals($expectedNewMoney, $actualNewMoney, 'Accountant is not exchanging money to a new currency correctly.');
    }

    /**
     * can compare monies
     */
    public function testComparesMoniesCorrectly(){

        //setup monies
        $money1 = new Money(1000, 'usd');
        $money2 = new Money(1001, 'usd');
        $money3 = new Money(999, 'usd');
        $money4 = new Money(1000, 'usd');

        //compare
        $lessThan = $this->accountant->compare($money1, $money2);
        $greaterThan = $this->accountant->compare($money1, $money3);
        $equalTo = $this->accountant->compare($money1, $money4);

        //test
        $this->assertSame(-1, $lessThan, 'Accountant is not comparing less than values correctly.');
        $this->assertSame(1, $greaterThan, 'Accountant is not comparing greater than values correctly.');
        $this->assertSame(0, $equalTo, 'Accountant is not comparing equal values correctly.');
    }

    /**
     * can check if money is greater than another money
     */
    public function testIsGreaterThan(){

        //setup monies
        $money1 = new Money(1000, 'usd');
        $money2 = new Money(1001, 'usd');

        //test
        $this->assertSame(false, $this->accountant->isGreaterThan($money1, $money2));
        $this->assertSame(true, $this->accountant->isGreaterThan($money2, $money1));
    }

    /**
     * can check if money is less than other money
     */
    public function testIsLessThan(){

        //setup monies
        $money1 = new Money(1000, 'usd');
        $money2 = new Money(1001, 'usd');

        //test
        $this->assertSame(true, $this->accountant->isLessThan($money1, $money2));
        $this->assertSame(false, $this->accountant->isLessThan($money2, $money1));
    }

    /**
     * can check if money is equal to other money
     */
    public function testIsEqualTo(){

        //setup monies
        $money1 = new Money(1000, 'usd');
        $money2 = new Money(1001, 'usd');
        $money3 = new Money(1000, 'usd');

        //test
        $this->assertSame(true, $this->accountant->isEqualTo($money1, $money3));
        $this->assertSame(false, $this->accountant->isLessThan($money1, $money2));
    }

    /**
     * throws appropriate exception when currencies do not match
     */
    public function testUnmatchedCurrenciesThrowException(){

        //2 monies of different currencies
        $money1 = new Money(1000, 'usd');
        $money2 = new Money(1000, 'eur');

        //try
        try{
            $this->accountant->add($money1, $money2);
        }

        //money exception
        catch(MoneyException $e){
            return;
        }

        $this->fail('Accountant is not catching unmatched currencies.');
    }

}
