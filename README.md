# money

[![Latest Version](https://img.shields.io/github/release/browner12/money.svg?style=flat-square)](https://github.com/browner12/money/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/browner12/money/master.svg?style=flat-square)](https://travis-ci.org/browner12/money)
[![Total Downloads](https://img.shields.io/packagist/dt/browner12/money.svg?style=flat-square)](https://packagist.org/packages/browner12/money)

This is a money package for PHP. It includes a `Money`, a `Currency`, and an `Accountant`. Understanding the differences between these 3 classes is important. The way these classes relate to each other is what makes this package different from some of the existing PHP money packages available. `Money` is composed of two attributes: a numeric value, and a `Currency`. The `Currency` is a descriptor. It knows nothing about the value, but provides `Money` with the information it needs to describe the value. The `Accountant` handles your `Money`. He can perform many calculations with your `Money`, including adding, subtracting, summing, allocating, calculating tax rates, and more.

The value `Money` holds is important to understand. `Currency`s have both base units and subunits. For the US Dollar, the base unit is the dollar. The subunit is the cent. Internally, `Money` tracks its value in subunits. While you can pass either base units or subunits to create a `Money` object, by default we assume you are passing subunits. See the documentation below on how to alter this assumption.

__Note:__ The `Accountant` can only act on multiple `Money`s of the same `Currency`. Different `Currency`s will throw an exception. If you would like to convert one `Currency` to another, use the `Accountant`'s `exchange()` method. You must supply the exchange rate.

## Who Should Use This Package

USE this package if you are running an e-commerce website and handle the cart and payment yourself. This package provides many helper functions to make calculating line totals, taxes, subtotals, and totals very simple.

## Who Should Not Use This Package

DO NOT use this package if you need precision greater than the subunit of a currency. For example, in the financial world the US Dollar is normally tracked to the ten thousandths place (4 decimals). This equates to 1/100 of a cent (the subunit). The smallest value this package handles is 1 subunit of a currency, and any values more precise than 1 subunit will be rounded.

## Caution

Be aware if your system is a 32 or 64 bit architecture, as this determines the largest integer value you can represent. For 32-bit this is 2147483647, and for 64-bit it is 9223372036854775807. Either way for most base 100 currencies this will not be an issue unless you are dealing with large amounts of money (millions), but it is something to be aware of.

## PSRs

This package follows PSR-1 and PSR-4. All contributions should follow these as well.

## Influence

This package was influenced by [sebastianbergmann/money](https://github.com/sebastianbergmann/money), and [mathiasverraes/money](https://github.com/mathiasverraes/money). There were parts of those packages I liked, but parts I did not, so I decided to make my own. More specifically, I believe this package has better class layout and organization, and the relationships between the classes more accurately reflect the real world. I also believe this package follows the SRP better by way of the `Accountant` class. In the other packages, the `Money` class had too much responsibility, including performing calculations. In this package `Money` is simply responsible for knowing its value and `Currency`, and the `Accountant` is responsible for performing calculations.

## Install

Via Composer

``` bash
$ composer require browner12/money
```

## Documentation

There are 3 classes to work with: `Currency`, `Money`, and `Accountant`. We will go through each individually.

For all documentation the following assumptions are made

+ all appropriate classes are imported with `use`
+ if no currency is specified, it is US Dollars (USD)

### Currency Object

While it is available, you should never have to manually create a `Currency` object. When you create a `Money` object we will handle it for you. However, if you do need to there are some simple 'getters' to access its properties.

```php
//create a US Dollar currency
$currency = new USD();

//retrieve its properties
echo $currency->currency();        // 'USD'
echo $currency->name();            // 'US Dollar'
echo $currency->code();            // 840
echo $currency->subunit();         // 100
echo $currency->precision();       // 2

//__toString magic method
echo $currency;                    // 'USD (US Dollar)'

```

### Money Object

As stated above the `Money` object consists of a value and a `Currency`. In order to use integers (rather than floats) whenever possible, internally the value is stored in subunits. By default the value is passed in as the number of subunits, although this can be overridden (see below).

```php
//create money
$money = new Money(1000, 'usd', false);
```

The first parameter is the value, and is required. Ideally it is an integer, but there will be many times when that is not easy/possible (coming from a database value that gives you everything as a string). You may pass an integer, float, string that looks like an integer, and string that looks like a float. Internally the package will determine which of these types was passed, and set the value accordingly. All 4 of the following examples set the `Money` to $10.00.

```php
//pass an integer
$integer = new Money(1000);

//pass a float
$float = new Money(1000.00);

//pass a string integer
$stringInteger = new Money('1000');

//pass a string float
$stringFloat = new Money('1000.00');
```

The second parameter is the currency, and is optional. The default value is 'USD'. You CAN NOT pass a currency object, but rather pass the string of the 3 letter currency. For example, 'USD' for US Dollar, 'EUR' for Euro, and 'AUD' for Australian Dollar. The string is case-insensitive.

```php
//us dollar
$usd = new Money(1000, 'usd');

//euro
$eur = new Money(1000, 'EUR');

//australian dollar
$aud = new Money(1000, 'aUd');
```

The third parameter is a boolean, and is optional. The default value is FALSE. When passing in the value, we will assume you are giving the number of subunits. If you would like to give the number of base units, pass TRUE as the third parameter. Internally, the value is converted to subunits to maintain the use of integers.

```php
//create money worth 10 USD
$money = new Money(1000, 'usd');

//create money worth 1000 USD
$money = new Money(1000, 'usd', true);
```

The `Money` object provides the following public methods

```php
$money = new Money(1234, 'usd');

//get the subunits
echo $money->subunits();                // 1234

//get the value (base units)
echo $money->value();                   // 12.34

//get currency
echo $money->getCurrency();             // currency object

//format using built-in PHP number formatter (PHP INTL package required)
echo $money->format();                  // $12.34

//can pass a locale as parameter, default is 'en-US'
echo $money->format('en-CA');           // US$12.34
echo $money->format('de_DE');           // 12,34 $

//magic json serialize
echo json_serialize($money);            // ['value' => 12.34,
                                           	'subunits' => 1234,
                                           	'currency' => currency object,
                                           ]

//magic toString
echo $money;                            // $12.34
```

### Accountant Object

The `Accountant` handles your `Money`. For most of the methods he will return a new `Money` object to you. He takes one optional constructor parameter, which is the rounding mode. The default value is `PHP_ROUND_HALF_UP`. Be aware this is not a string, but a PHP constant. The `Accountant` has many basic methods like add, subtract, and multiply, but also some helper methods like calculate tax or calculate the total for a cart. We will go through each public method below. When a method returns a `Money` object, we will show the resulting subunit value.

```php
$accountant = new Accountant();
```

#### Add

Takes 2 parameters, both `Money` objects, and adds them together. It returns a `Money` object.

```php
@param Money
@param Money
@return Money

$money1 = new Money(1234);
$money2 = new Money(2532);

echo $accountant->add($money1, $money2);        // 3766
```

#### Subtract

Takes 2 parameters, both `Money` objects, and subtract them. It returns a `Money` object.

```php
@param Money
@param Money
@return Money

$money1 = new Money(2532);
$money2 = new Money(1234);

echo $accountant->add($money1, $money2);        // 1298
```

#### Sum

Takes 1 array parameter, and finds the sum of all the values. Be aware that any elements of the array that are not `Money` objects will be filtered out, and no error will be thrown.

```php
@param array
@return Money

$money1 = new Money(1234);
$money2 = new Money(2532);
$money3 = new Money(745);
$money4 = new Money(33);

echo $accountant->sum([$money1, $money2, $money3, $money4]);        // 4544
```

#### Multiply

Multiplies a `Money` object by a float value, and returns a `Money` object. Be aware of the rounding that can occur here.

```php
@param Money
@param float
@return Money

$money = new Money(1234);

echo $accountant->multiply($money, 1.23);        // 1518
```

#### Negate

Returns a new `Money` with the negative value of the original.

```php
@param Money
@return Money

$money = new Money(1234);

echo $accountant->negate($money);				// -1234
```

#### Discount

Discount is a wrapper function that applies a percentage discount to a `Money` and returns one with the new value. The following example applies a 12.5% discount to something that costs $21.99.

 ```php
 @param Money
 @param float
 @return Money

 $money = new Money(2199);

 echo $accountant->discount($money, 12.5);		// 1924
 ```

#### Tax

Tax is a wrapper function that allows you to pass a percentage value (rather than a decimal) to calculate tax. The following example calculates the tax on $12.50 when the tax rate is 5.5%.

```php
@param Money
@param float
@return Money

$money = new Money(1250);

echo $accountant->tax($money, 5.5);				// 69
```

#### Subtotal

Subtotal is a handy method for when dealing with carts. It will take an array of objects that implement the included `OrderLineInterface` and calculate the subtotal. This is the quantity times the unit price of each product, summed up. The `OrderLineInterface` only enforces a `getQuantity` and `getUnitPrice` contract. In the following example, we will assume the `OrderLine` object implements the `OrderLineInterface`, and it is constructed by passing the unit price, then the quantity.

```php
@param array
@return Money

$lines = [
    new OrderLine(new Money(1000), 2),
    new OrderLine(new Money(1299), 1),
    new OrderLine(new Money(350), 3),
];

echo $accountant->subtotal($lines);				// 4349
```

#### Subtotal From Array

This method is identical to the 'Subtotal' except it doesn't require the `OrderLineInterface`. Rather, you can pass an array.

```php
$lines = [
	['quantity' => 2, 'unitPrice' => new Money(1000)],
	['quantity' => 1, 'unitPrice' => new Money(1299)],
	['quantity' => 3, 'unitPrice' => new Money(350)],
];

echo $accountant->subtotalFromArray($lines);						// 4349
```

#### Total

This method calculates the cart total. Pass it the order lines, the tax rate, shipping cost (optional), and handling cost (optional).

```php
@param array
@param float
@param Money
@param Money
@return Money

//order lines
$line1 = new OrderLine(new Money(1499), 1);
$line2 = new OrderLine(new Money(299), 3);
$line3 = new OrderLine(new Money(525), 2);

//tax rate
$taxRate = 5.5;

//shipping and handling
$shipping = new Money(375);
$handling = new Money(100);

//calculate total
echo $accountant->total([$line1, $line2, $line3], $taxRate, $shipping, $handling);				// 4111

```

#### Allocate

Allocate allows us to divide `Money` up to 'n' divisions. It does not simply divide, since many times there is a remainder, so every division will not always get the same amount

```php
@param Money
@param int
@return array

$money = new Money(1250);

echo $accountant->allocate($money, 4);			// [313, 313, 312, 312]
```

#### Exchange

This method will allow you to exchange one currency for another. You must provide the exchange rate. In the following example, 1 USD is equal to 0.87 EUR.

```php
@param Money
@param string
@param float
@return Money

$usd = new Money(1000);

echo $accountant->exchange($usd, 'eur', 0.87);     // 870
```

#### Compare

This method allows you to see if a `Money` is greater than, less than, or equal to another `Money`. It return -1 for less than, 1 for greater than, and 0 for equal to.

```php
@param Money
@param Money
@return int

$money1 = new Money(1000);
$money2 = new Money(1000);
$money3 = new Money(1001);

echo $accountant->compare($money1, $money2);	// 0
echo $accountant->compare($money1, $money3);	// -1
echo $accountant->compare($money3, $money1);	// 1
```

#### Is Greater Than

This is a wrapper function of compare. It returns `TRUE` if the first `Money` is greater than the second `Money`.

```php
@param Money
@param Money
@return bool

$money1 = new Money(999);
$money2 = new Money(1000);
$money3 = new Money(1001);

echo $accountant->isGreaterThan($money2, $money1);	// true
echo $accountant->isGreaterThan($money2, $money3);	// false
```

#### Is Less Than

This is a wrapper function of compare. It returns `TRUE` if the first `Money` is less than the second `Money`.

```php
@param Money
@param Money
@return bool

$money1 = new Money(999);
$money2 = new Money(1000);
$money3 = new Money(1001);

echo $accountant->isLessThan($money2, $money3);	// true
echo $accountant->isLessThan($money2, $money1);	// false
```

#### Is Equal To

This is a wrapper function of compare. It returns `TRUE` if the first `Money` is equal to the second `Money`.

```php
@param Money
@param Money
@return bool

$money1 = new Money(999);
$money2 = new Money(1000);
$money3 = new Money(1000);

echo $accountant->isEqualTo($money2, $money3);	// true
echo $accountant->isEqualTo($money2, $money1);	// false
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Adding A Currency

We use an generator to create the class files for each individual currency, based on our template. To add a currency, edit the `src/generator/CurrencyGenerator.php` file, and add your currency to the `currencies` class property.

## Credits

- [Andrew Brown](https://github.com/browner12)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
