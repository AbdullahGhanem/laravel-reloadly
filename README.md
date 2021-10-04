# Laravel Reloadly

[![Latest Stable Version](https://poser.pugx.org/ghanem/reloadly/v/stable)](https://packagist.org/packages/ghanem/reloadly) [![Total Downloads](https://poser.pugx.org/ghanem/reloadly/downloads)](https://packagist.org/packages/ghanem/reloadly) [![Latest Unstable Version](https://poser.pugx.org/ghanem/reloadly/v/unstable)](https://packagist.org/packages/ghanem/reloadly) [![License](https://poser.pugx.org/ghanem/reloadly/license)](https://packagist.org/packages/ghanem/reloadly)

A package that provides an interface between [Laravel](https://laravel.com/docs/8.x) and [Reloadly API](https://dvs-api-doc.reloadly.com/#section/Overview), includes Gifs.

## Installation
- [Reloadly on Packagist](https://packagist.org/packages/ghanem/reloadly)
- [Reloadly on GitHub](https://github.com/abdullahghanem/reloadly)


You can install the package via composer:

```bash
composer require ghanem/reloadly
```

now you need to publish the config file with:
```bash
php artisan vendor:publish --provider="Ghanem\Reloadly\ReloadlyServiceProvider" --tag="config"
```

## how to use

### import Reloadly Facade
```php
<?php
....

use Ghanem\Reloadly\Facades\Reloadly;

class PostController extends Controller
{
    public function makeReport()
    {
        $countries =  Reloadly::countries();
    }
```

### available methods
#### Get all Countries
```php
Reloadly::countries();
```

#### Get Country By Iso Code
```php
Reloadly::countryByIsoCode('eg');
```

#### Get all Operators
```php
Reloadly::operators();
// filter by country Iso Code
Reloadly::operators('eg');
```

#### Get Operator By Id
```php
Reloadly::operatorById(1);
```

#### auto Detect Operators for number by Iso Code
```php
Reloadly::autoDetectOperator('eg', '+201013001322');
```

#### get balances
```php
Reloadly::balances();
```

#### make airtime recharge
```php
Reloadly::createTransaction("120", "15", ['countryCode' => 'EG', 'number' => '1013001322']);
```

#### Get all Transactions
```php
Reloadly::transactions();
```

#### Get Transaction By Id
```php
Reloadly::transactionById(20818);
```


