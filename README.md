# money

[![Latest Version](https://img.shields.io/github/release/browner12/money.svg?style=flat-square)](https://github.com/browner12/money/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/browner12/money/master.svg?style=flat-square)](https://travis-ci.org/browner12/money)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/browner12/money.svg?style=flat-square)](https://scrutinizer-ci.com/g/browner12/money/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/browner12/money.svg?style=flat-square)](https://scrutinizer-ci.com/g/browner12/money)
[![Total Downloads](https://img.shields.io/packagist/dt/browner12/money.svg?style=flat-square)](https://packagist.org/packages/browner12/money)

This package deals with money. It includes a `Money` value object, a `Currency`, and an `Accountant`. Understanding the difference between this 3 classes is important. The way these classes relate to each other is what makes this package different from some of the existing PHP money packages available. `Money` is composed of two attributes: a numeric value, and a `Currency`. The `Currency` is a descriptor. It knows nothing about the value, but provides `Money` with the information it needs to describe the value. The `Accountant` handles your `Money`. He can perform many calculations with your `Money`, including adding and subtracting, summing, allocating, and calculating tax rates.

Another important distinction is understanding the values you should give to `Money` and the values it can return. For an example, we will use a `USD` (US Dollar). While the 'dollar' is considered the monetary unit in the United States, a dollar can actually be broken down into subunits (aka 'cents' or 'pennies'). 100 'cents' make up 1 `USD`.

While other package say a US Dollar (USD) is a (aka `extends`) money, I believe this is incorrect. USD is a `Currency`, and can be used to describe a `Money`'s value.

__Note:__ This package does not in any way attempt to handle currency conversions / exchange rates. If multiple `Money`s are passed to the `Accountant`, they must all be of the same `Currency`.

## PSRs

This package follows PSR-1 and PSR-4. All contributions should follow these as well.

## INFLUENCE

This package was influenced by [sebastianbergmann/money](https://github.com/sebastianbergmann/money), and [mathiasverraes/money](https://github.com/mathiasverraes/money). While there were definitely some things I liked in these packages, there were other things I did not. More specifically, the organization of the classes, and the relationships between them did not seem to accurately reflect the real world. I also believe this package follows SRP a little better because of the `Accountant` class. In the other packages, their `Money` classes are responsible for performing calculations on themselves.

## Install

Via Composer

``` bash
$ composer require browner12/money
```

## Usage

``` php
//create a US Dollar money object
$money = new browner12\money\USD(1575);

//show the formatted
echo $money->display();

//get the integer value in minor unit
echo $money->minorValue();

//get the value of the major unit
echo $money->value();
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Andrew Brown](https://github.com/browner12)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
