# Bongloy PHP bindings 

![Build Bongloy PHP](https://github.com/khomsovon/bongloy-php/workflows/Build%20Bongloy%20PHP/badge.svg)
[![Total Downloads](https://poser.pugx.org/bongloy/bongloy-php/downloads.svg)](https://packagist.org/packages/bongloy/bongloy-php)
[![License](https://poser.pugx.org/bongloy/bongloy-php/license.svg)](https://packagist.org/packages/bongloy/bongloy-php)

The Bongloy PHP library provides convenient access to the Bongloy API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the Bongloy 
API.

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require bongloy/bongloy-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```


## Getting Started

Simple usage looks like:

```php
\Bongloy\Bongloy::setApiKey('sk_test_*****');
$charge = \Stripe\Charge::create([
    'amount' => 1000,
    'currency' => 'USD',
    'source' => '6b1ca112-add7-4bc6-b520-829e004c0580',
]);
echo $charge;
```

## Documentation

For a comprehensive list of examples, check out the [API
documentation](https://sandbox.bongloy.com/documentation).
