---
prev: 6_retrieve-visits-and-stats
next: 8_clear-and-reset-values
---

# Visits Lists
Top or Lowest list per model type

## Top/Lowest 10
```php
visits('App\Post')->top(10);
```
```php
visits('App\Post')->low(10);
```

## Uncached list
```php
visits('App\Post')->fresh()->top(10);
```
> **Note:** you can always get uncached list by enabling `alwaysFresh` from package config.

## By a period of time
```php
visits('App\Post')->period('month')->top(10);
```