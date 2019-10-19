---
prev: 4_quick-start
next: 6_retrieve-visits-and-stats
---


# Increments and Decrements

## Increment
### One
```php
visits($post)->increment();
```
### More than one
```php
visits($post)->increment(10);
```

## Decrement
### One
```php
visits($post)->decrement();
```
### More than one
```php
visits($post)->decrement(10);
```

## Increment/decrement once per x seconds 
based on visitor's IP
```php
visits($post)->seconds(30)->increment()
```
> **Note:** this will override default config setting (once each 15 minutes per IP).


## Force increment/decrement
```php
visits($post)->forceIncrement();
visits($post)->forceDecrement();
```
- This will ignore IP limitation and increment/decrement every visit.

