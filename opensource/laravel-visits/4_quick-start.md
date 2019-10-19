---
prev: 3_installation
next: 5_increments-and-decrements
---


# Quick Start

It's simple.
Using `visits` helper as:

```php
visits($model)->{method}()
```
Where:
- **$model**: is any Eloquent model from your project.
- **{method}**: any method that is supported by this library, and they are documented below.

## Tags
- You can track multiple kinds of visits to a single model using the tags as `visits($model,'tag1')->increment()`


## Integration with Eloquent

You can add a `visits` method to your model class:

```php
public function visits()
{
    return visits($this);
}
```

Then you can use it as:

```php
$post = Post::find(1);
$post->visits()->increment();
$post->visits()->count();
```