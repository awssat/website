---
prev: 1_introduction
next: 3_installation
---

# Requirements
- Laravel 5.5+
- PHP 7.2+
- Data engines options (can be configured from config/visits.php): 
  - Redis: make sure that Redis is configured and ready. (see [Laravel Redis Configuration](https://laravel.com/docs/5.6/redis#configuration))
  - Database: publish migration file: `php artisan vendor:publish --provider="Awssat\Visits\VisitsServiceProvider" --tag="migrations"` then migrate.

