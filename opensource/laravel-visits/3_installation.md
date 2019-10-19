---
prev: 2_requirements
next: 4_quick-start
---

# Installation

To get started with Laravel Visits, use Composer to add the package to your project's dependencies:
```bash
composer require awssat/laravel-visits
```


## Config
To adjust the package to your needs, you can publish the config file to your project's config folder using:

```bash
php artisan vendor:publish --provider="Awssat\Visits\VisitsServiceProvider"
```

> **Note** : Redis Database Name

- By default `laravel-visits` doesn't use the default laravel redis configuration (see [issue #5](https://github.com/awssat/laravel-visits/issues/5))

To prevent any data loss add a new connection on `config/database.php`

```php
'laravel-visits' => [
    'host' => env('REDIS_HOST', '127.0.0.1'),
    'password' => env('REDIS_PASSWORD', null),
    'port' => env('REDIS_PORT', 6379),
    'database' => 3, // anything from 1 to 15, except 0 (or what is set in default)
],
```

and you can define your redis connection name on `config/visits.php`
```php

'connection' => 'default' // to 'laravel-visits'
```