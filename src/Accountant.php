<?php  namespace browner12\money;

use browner12\money\exceptions\MoneyException;
use browner12\money\Money;

class Accountant {

    /**
     * constructor
     */
    public function __construct(){}

    /**
     * calculate the sum of monies
     *
     * @param array $monies
     * @return \browner12\money\Money
     */
    public function sum($monies){

        //initialize total
        $total = 0;

        //check currencies
        $currency = $this->isSameCurrency($monies);

        //sum
        foreach($monies as $money){
            $total += $money->subunits();
        }

        //create and return new money
        return new Money($total, $currency);
    }

    /**
     * add monies
     *
     * @param \browner12\money\Money $addend1
     * @param \browner12\money\Money $addend2
     * @return \browner12\money\Money
     */
    public function add(Money $addend1, Money $addend2){

        //check currencies match
        $currency = $this->isSameCurrency([$addend1, $addend2]);

        //add money
        $sum = $addend1->subunits() + $addend2->subunits();

        //create and return new money
        return new Money($sum, $currency);
    }

    /**
     * subtract
     *
     * @param \browner12\money\Money $minuend
     * @param \browner12\money\Money $subtrahend
     * @return \browner12\money\Money
     */
    public function subtract(Money $minuend, Money $subtrahend){

        //check currencies match
        $currency = $this->isSameCurrency([$minuend, $subtrahend]);

        //subtract money
        $difference = $minuend->subunits() - $subtrahend->subunits();

        //create and return new money
        return new Money($difference, $currency);
    }

    /**
     * multiply
     *
     * @param \browner12\money\Money $multiplicand
     * @param float $multiplier
     * @return \browner12\money\Money
     */
    public function multiply(Money $multiplicand, $multiplier){

        //calculate product
        $product = $multiplicand->subunits() * $multiplier;

        //create and return new money
        return new Money($product, $multiplicand->getCurrency()->currency());
    }

    /**
     * negate
     *
     * @param \browner12\money\Money $money
     * @return \browner12\money\Money
     */
    public function negate(Money $money){

        $newValue = -($money->subunits());

        //create and return new money
        return new Money($newValue, $money->getCurrency()->currency());
    }

    /**
     * discount
     *
     * this is best explained by example. You are selling a product for $100 and the customer
     * has a discount for 5% off their order (which equals $5). This method will return
     * a new money object worth $95.
     *
     * @param \browner12\money\Money $money
     * @param int $percentage
     * @return \browner12\money\Money
     */
    public function discount(Money $money, $percentage){

        //get subtrahend
        $subtrahend = $this->multiply($money, $percentage);

        //subtract off discount
        return $this->subtract($money, $subtrahend);
    }

    /**
     * tax
     *
     * given a Money object, and a tax rate, calculate the tax
     * give $taxRate as the percentage. for example, if the
     * tax rate is 5.5%, pass in 5.5
     *
     * @param \browner12\money\Money $money
     * @param float $taxRate
     * @return \browner12\money\Money
     */
    public function tax(Money $money, $taxRate){

        //convert tax rate to multiplier
        $multiplier = $taxRate / 100;

        //return tax
        return $this->multiply($money, $multiplier);
    }

    /**
     * allocate
     *
     * @param \browner12\money\Money $money
     * @param int $divisions
     * @return array
     */
    public function allocate(Money $money, $divisions){

        //initialize
        $return = [];

        //divide
        $allocation = (int) floor($money->subunits() / $divisions);

        //remainder
        $remainder = $money->subunits() % $divisions;

        //give each division an equal amount
        for($a=1;$a<=$divisions;$a++){
            $return[] = $allocation;
        }

        //and then hand out the remainder
        for($b=0;$b<$remainder;$b++){
            $return[$b]++;
        }

        //
        return $return;
    }

    /**
     * exchange one currency for another
     *
     * @todo work in progress, DO NOT USE THIS
     * @param \browner12\money\Money $money
     * @param $newCurrency
     * @param float $exchangeRate
     * @return \browner12\money\Money
     */
    public function exchange(Money $money, $newCurrency, $exchangeRate){

        //get new value
        $newValue = (int) round($money->subunits() * $exchangeRate, 0);

        //create and return the new money
        return new Money($newValue, $newCurrency);
    }

    /**
     * compare
     *
     * tell user if $money1 is less than (-1), greater than (1), or equal to (0) $money2
     *
     * @param \browner12\money\Money $money1
     * @param \browner12\money\Money $money2
     * @return int
     */
    public function compare(Money $money1, Money $money2){

        //check currencies
        $this->isSameCurrency([$money1, $money2]);

        //equal to
        if($money1->subunits() == $money2->subunits()){
            return 0;
        }

        //greater than or less than
        return ($money1->subunits() > $money2->subunits()) ? 1 : -1;
    }

    /**
     * check if $money1 is greater than $money2
     *
     * @param \browner12\money\Money $money1
     * @param \browner12\money\Money $money2
     * @return bool
     */
    public function isGreaterThan(Money $money1, Money $money2){
        return ($this->compare($money1, $money2) === 1) ? true : false;
    }

    /**
     * check if $money1 is less than $money2
     *
     * @param \browner12\money\Money $money1
     * @param \browner12\money\Money $money2
     * @return bool
     */
    public function isLessThan(Money $money1, Money $money2){
        return ($this->compare($money1, $money2) === -1) ? true : false;
    }

    /**
     * check if $money1 is equal to $money2
     *
     * @param \browner12\money\Money $money1
     * @param \browner12\money\Money $money2
     * @return bool
     */
    public function isEqualTo(Money $money1, Money $money2){
        return ($this->compare($money1, $money2) === 0) ? true : false;
    }

    /**
     * check that the currencies of monies match
     *
     * @param array $monies
     * @return string
     * @throws \browner12\money\exceptions\MoneyException
     */
    private function isSameCurrency($monies){

        //what currency are we comparing
        $currencyToMatch = $monies[0]->getCurrency()->currency();

        //check they all match the first one
        foreach($monies as $money){
            if($money->getCurrency()->currency() != $currencyToMatch){
                throw new MoneyException('Currencies do not match.');
            }
        }

        //give back the currency
        return $currencyToMatch;
    }

}