<?php  namespace browner12\money;

use browner12\money\exceptions\MoneyException;
use browner12\money\interfaces\OrderLineInterface;
use browner12\money\Money;

class Accountant {

    /**
     * rounding mode
     *
     * @var string
     */
    private $roundingMode;

    /**
     * constructor
     *
     * @param int $roundingMode
     */
    public function __construct($roundingMode = PHP_ROUND_HALF_UP){

        //set rounding mode
        $this->setRoundingMode($roundingMode);
    }

    /**
     * calculate the sum of monies
     *
     * @param array $monies
     * @return \browner12\money\Money
     */
    public function sum($monies){

        //initialize total
        $total = 0;

        //filter monies
        $monies = $this->filterMonies($monies);

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
        $product = (int) round($multiplicand->subunits() * $multiplier, 0, $this->roundingMode);

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
     * @param float $percentage
     * @return \browner12\money\Money
     */
    public function discount(Money $money, $percentage){

        //determine multiplier
        $multiplier = (100 - $percentage) / 100;

        //return discounted value
        return $this->multiply($money, $multiplier);
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
     * calculate subtotal of a cart
     *
     * each element of the line array must implement \browner12\money\interfaces\OrderLineInterface
     *
     * @param array $lines
     * @return \browner12\money\Money
     */
    public function subtotal($lines){

        //calculate line totals
        foreach($lines as $line){
            $lineTotals[] = $this->multiply($line->getUnitPrice(), $line->getQuantity());
        }

        //sum the line totals
        return $this->sum($lineTotals);
    }

    /**
     * calculate subtotal of cart
     *
     * if you do not wish to use the provided OrderLineInterface, you can manually pass in an array
     * in the following format:
     *
     * $lines = [
     *      ['quantity' => 2, 'unitPrice' => new Money(100)],
     *      ['quantity' => 1, 'unitPrice' => new Money(200)],
     *      ['quantity' => 3, 'unitPrice' => new Money(300)],
     * ]
     *
     * @param array $lines
     * @return \browner12\money\Money
     */
    public function subtotalFromArray($lines){

        //calculate line totals
        foreach($lines as $line){
            $lineTotals[] = $this->multiply($line['unitPrice'], $line['quantity']);
        }

        //sum the line totals
        return $this->sum($lineTotals);
    }

    /**
     * calculate cart total
     *
     * this a helper function, basically a wrapper for some others
     *
     * @param array $lines
     * @param float $taxRate
     * @param \browner12\money\Money $shipping
     * @param \browner12\money\Money $handling
     * @return \browner12\money\Money
     */
    public function total($lines, $taxRate, Money $shipping = null, Money $handling = null){

        //calculate subtotal
        $subtotal = $this->subtotal($lines);

        //calculate tax
        $tax = $this->tax($subtotal, $taxRate);

        //total
        $total[] = $subtotal;
        $total[] = $tax;
        ($shipping) ? $total[] = $shipping : null;
        ($handling) ? $total[] = $handling : null;

        //calculate total
        return $this->sum([$subtotal, $tax, $shipping, $handling]);
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

            //gets a remainder
            if($a <= $remainder){
                $return[] = new Money($allocation + 1);
            }

            //does not get a remainder
            else{
                $return[] = new Money($allocation);
            }
        }

        //return
        return $return;
    }

    /**
     * allocate by ratios
     *
     * @todo WIP
     * @param \browner12\money\Money $money
     * @param array $ratios
     * @return array
     */
    public function allocateByRatios(Money $money, $ratios){

        //total
        $total = array_sum($ratios);

        //loop
        foreach($ratios as $ratio){
            $allocations[] = $money->subunits() * $ratio / $total;
        }

        //make new money objects
        foreach($allocations as $allocation){
            $return[] = new Money($allocation, $money->getCurrency()->currency());
        }

        //return
        return $return;
    }

    /**
     * exchange one currency for another
     *
     * the exchange rate is in terms of 1 original currency = x new currency
     *
     * @param \browner12\money\Money $money
     * @param string $newCurrency
     * @param float $exchangeRate
     * @return \browner12\money\Money
     */
    public function exchange(Money $money, $newCurrency, $exchangeRate){

        //get new value
        $newValue = $money->value() * $exchangeRate;

        //create and return the new money
        return new Money($newValue, $newCurrency, true);
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
    private function isSameCurrency(array $monies){

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

    /**
     * set the rounding mode
     *
     * @param int $roundingMode
     * @throws \browner12\money\exceptions\MoneyException
     */
    private function setRoundingMode($roundingMode){

        //rounding modes
        $modes = [
            PHP_ROUND_HALF_UP,
            PHP_ROUND_HALF_DOWN,
            PHP_ROUND_HALF_EVEN,
            PHP_ROUND_HALF_ODD,
        ];

        //check that it is valid
        if(!in_array($roundingMode, $modes)){
            throw new MoneyException('Invalid rounding mode.');
        }

        //set it
        $this->roundingMode = $roundingMode;
    }

    /**
     * filter an array to exclude anything that is not a Money
     * since we can not type hint elements of array
     *
     * @param array $monies
     * @return array
     */
    private function filterMonies(array $monies){

        //remove any elements that are not money objects
        foreach($monies as $money){

            if($money instanceof Money AND !is_null($money)){
                $filteredMonies[] = $money;
            }
        }

        //return filtered array
        return $filteredMonies;
    }

}
