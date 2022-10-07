# PHP Esputnik api client

Uses [Esputnik API](https://esputnik.com.ua/api/index.html).


## Requirements

* PHP >= 5.6
* [Guzzle 6.0+](https://github.com/guzzle/guzzle) library,
* (optional) PHPUnit to run tests.

## Installing

```
composer require updevru/php-esputnik-api dev-master
```

## Basic usage

```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

$client = new \Esputnik\Client();
$client->authenticate('login', 'password');

$repositories = $client->api(\Esputnik\Client::API_BALANCE)->show();
```

From `$client` object, you can access to all namespaces.

## Inspired by

[KnpLabs/php-github-api](https://github.com/KnpLabs/php-github-api)

## License

MIT License
