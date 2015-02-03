<?php namespace browner12\money\tests;

use browner12\money\Accountant;
use browner12\money\exceptions\MoneyException;
use browner12\money\Money;
use Mockery;

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
     * tear down
     */
    public function tearDown(){
        Mockery::close();
    }

    /**
     * throws exception for invalid rounding mode
     */
    public function testThrowsExceptionsForInvalidRoundingMode(){

        try{
            new Accountant('invalidRoundingMode');
        }
        catch(MoneyException $e){
            return true;
        }

        $this->fail('Accountant is not catching invalid rounding modes.');
    }

    /**
     * sets rounding mode correctly
     */
    public function testSetsValidRoundingMode(){

        try{
            new Accountant(PHP_ROUND_HALF_DOWN);
            new Accountant(PHP_ROUND_HALF_EVEN);
            new Accountant(PHP_ROUND_HALF_ODD);
        }
        catch(MoneyException $e){
            $this->fail('Accountant is not recognizing valid rounding modes.');
        }

        return true;

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

        //expected
        $expected = new Money(6689);

        //test
        $this->assertEquals($expected, $total, 'Accountant is not summing monies correctly.');
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

        //expected
        $expected = new Money(3579);

        //test
        $this->assertEquals($expected, $total, 'Accountant is not adding monies correctly.');
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

        //expected
        $expected1 = new Money(-1111);
        $expected2 = new Money(1111);

        //message
        $message = 'Accountant is not subtracting monies correctly.';

        //test
        $this->assertEquals($expected1, $total1, $message);
        $this->assertEquals($expected2, $total2, $message);
    }

    /**
     * multiplies money correctly
     */
    public function testMultipliesMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //multiply
        $product = $this->accountant->multiply($money, 0.055);

        //expected
        $expected = new Money(68);

        //test
        $this->assertEquals($expected, $product, 'Accountant is not multiplying money correctly.');
    }

    /**
     * discounts money correctly
     */
    public function testDiscountsMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //discount
        $discount = $this->accountant->discount($money, 10);

        //expected
        $expected = new Money(1111);

        //test
        $this->assertEquals($expected, $discount, 'Accountant is not discounting money correctly.');
    }

    /**
     * negates money correctly
     */
    public function testNegatesMoneyCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //negate
        $newMoney = $this->accountant->negate($money);

        //expected
        $expected = new Money(-1234);

        //test
        $this->assertEquals($expected, $newMoney, 'Accountant is not negating money correctly.');
    }

    /**
     * calculates tax
     */
    public function testCalculatesTaxCorrectly(){

        //create money
        $money = new Money(1234, 'usd');

        //calculate tax
        $tax = $this->accountant->tax($money, 5.5);

        //expected
        $expected = new Money(68);

        //test
        $this->assertEquals($expected, $tax, 'Accountant is not calculating tax correctly.');
    }

    /**
     * calculates subtotal
     */
    public function testCalculatesSubtotalCorrectly(){

        //setup
        $line = Mockery::mock('OrderLine');
        $line->shouldReceive('getQuantity')->once()->andReturn(1);
        $line->shouldReceive('getUnitPrice')->once()->andReturn(new Money(199));

        $line2 = Mockery::mock('OrderLine');
        $line2->shouldReceive('getQuantity')->once()->andReturn(3);
        $line2->shouldReceive('getUnitPrice')->once()->andReturn(new Money(1250));

        $line3 = Mockery::mock('OrderLine');
        $line3->shouldReceive('getQuantity')->once()->andReturn(2);
        $line3->shouldReceive('getUnitPrice')->once()->andReturn(new Money(2113));

        //calculate subtotal
        $subtotal = $this->accountant->subtotal([$line, $line2, $line3]);

        //expected
        $expected = new Money(8175);

        //test
        $this->assertEquals($expected, $subtotal, 'Accountant is not calculating a subtotal correctly.');
    }

    /**
     * calculates subtotal from array
     */
    public function testCalculatesSubtotalFromArrayCorrectly(){

        //setup
        $lines = [
            ['quantity' => 1, 'unitPrice' => new Money(199)],
            ['quantity' => 3, 'unitPrice' => new Money(1250)],
            ['quantity' => 2, 'unitPrice' => new Money(2113)],
        ];

        //calculate subtotal
        $subtotal = $this->accountant->subtotalFromArray($lines);

        //expected value
        $expected = new Money(8175);

        //test
        $this->assertEquals($expected, $subtotal, 'Accountant is not calculating the subtotal from an array correctly.');
    }

    /**
     * calculates total
     */
    public function testCalculatesTotalCorrectly(){

        //setup
        $line = Mockery::mock('OrderLine');
        $line->shouldReceive('getQuantity')->once()->andReturn(1);
        $line->shouldReceive('getUnitPrice')->once()->andReturn(new Money(1499));

        $line2 = Mockery::mock('OrderLine');
        $line2->shouldReceive('getQuantity')->once()->andReturn(3);
        $line2->shouldReceive('getUnitPrice')->once()->andReturn(new Money(299));

        $line3 = Mockery::mock('OrderLine');
        $line3->shouldReceive('getQuantity')->once()->andReturn(2);
        $line3->shouldReceive('getUnitPrice')->once()->andReturn(new Money(525));

        $shipping = new Money(375);
        $handling = new Money(100);

        //calculate subtotal
        $subtotal = $this->accountant->total([$line, $line2, $line3], 5.5, $shipping, $handling);

        //expected
        $expected = new Money(4111);

        //test
        $this->assertEquals($expected, $subtotal, 'Accountant is not calculating total correctly.');

    }

    /**
     * allocates money correctly when the values are equal between all divisions
     */
    public function testAllocatesEvenMoneyCorrectly(){

        //create money
        $money = new Money(1500, 'usd');

        //allocate money
        $allocations = $this->accountant->allocate($money, 5);

        //expected
        $expected = new Money(300);

        //message
        $message = 'Accountant is not allocating money correctly.';

        //correct number of allocations
        $this->assertSame(5, count($allocations), $message);

        //allocations are of correct value
        $this->assertEquals($expected, $allocations[0], $message);
        $this->assertEquals($expected, $allocations[1], $message);
        $this->assertEquals($expected, $allocations[2], $message);
        $this->assertEquals($expected, $allocations[3], $message);
        $this->assertEquals($expected, $allocations[4], $message);
    }

    /**
     * allocates money correctly when the values are not equal between all divisions
     */
    public function testAllocatesUnevenMoneyCorrectly(){

        //create money
        $money = new Money(1536, 'usd');

        //allocate money
        $allocations = $this->accountant->allocate($money, 7);

        //expectations
        $expectation1 = new Money(220);
        $expectation2 = new Money(219);

        //message
        $message = 'Accountant is not allocating money correctly.';

        //correct number of allocations
        $this->assertSame(7, count($allocations), $message);

        //allocations are of correct value
        $this->assertEquals($expectation1, $allocations[0], $message);
        $this->assertEquals($expectation1, $allocations[1], $message);
        $this->assertEquals($expectation1, $allocations[2], $message);
        $this->assertEquals($expectation2, $allocations[3], $message);
        $this->assertEquals($expectation2, $allocations[4], $message);
    }

    /**
     * allocates by ratios correctly
     */
    public function testAllocatesByRatiosCorrectly(){

        //create money
        $money = new Money(1000);

        //ratios
        $ratios = [50, 100, 500, 350];

        //allocate money
        $allocations = $this->accountant->allocateByRatios($money, $ratios);

        //haystack
        foreach($allocations as $allocation){
            $haystack[] = $allocation->subunits();
        }

        //message
        $message = 'Accountant is not allocating by ratios correctly.';

        //test
        $this->assertContains(50, $haystack, $message);
        $this->assertContains(100, $haystack, $message);
        $this->assertContains(500, $haystack, $message);
        $this->assertContains(350, $haystack, $message);
    }

    /**
     * exchanges money to new currency
     */
    public function testExchangesMoneyToNewCurrencyCorrectly(){

        //setup usd
        $usd = new Money(100);

        //exchange
        $actual = $this->accountant->exchange($usd, 'eur', 0.87);

        //expected
        $expected = new Money(87, 'eur');

        //test
        $this->assertEquals($expected, $actual, 'Accountant is not exchanging money to a new currency correctly.');
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
        $this->assertSame(false, $this->accountant->isEqualTo($money1, $money2));
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

    /**
     * filters monies that are not instances of Money
     */
    public function testFiltersMonies(){

        //setup
        $money1 = new Money(100);
        $money2 = new Money(200);

        $bad1 = null;
        $bad2 = new \stdClass();

        //run
        $sum = $this->accountant->sum([$money1, $bad1, $money2, $bad2]);

        //expected
        $expected = new Money(300);

        //test
        $this->assertEquals($expected, $sum, 'Accountant is not filtering monies correctly.');
    }

}
