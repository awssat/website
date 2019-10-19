---
prev: 7_visits-lists
next: false
---

# Clear and reset values

## Clear an item visits
```php
visits($post)->reset();
```

## Clear an item visits of specific period
```php
visits($post)->period('year')->reset();
```

## Clear recorded visitors' IPs
```php
visits($post)->reset('ips');
visits($post)->reset('ips','127.0.0.1');
```


## Periods options

- minute
- hour
- xhours [1hours ... to 12hours]
- day
- week
- month
- year
- quarter
- decade
- century

you can also make your custom period by adding a carbon marco in `AppServiceProvider`:

```php
Carbon::macro('endOf...', function () {
    //
});
```

## Other
```php
//clear all visits of the given model and its items
visits('App\Post')->reset();
//clear all cache of the top/lowest list
visits('App\Post')->reset('lists');
//clear visits from all items of the given model in a period
visits('App\Post')->period('year')->reset();
//...?
visits('App\Post')->reset('factory');
//increment/decrement methods offer ignore parameter to stop recording any items of ('country', 'refer', 'periods', 'operatingSystem', 'language')
visits('App\Post')->increment(1, false, ['country']);
```


 