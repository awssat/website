---
title: How to make faker uses multiple locales with Laravel model factories
date: 2022-05-04
description: Add many different locales and languages to faker with Laravel new model factories
tags: [php, laravel]
author: Abdulrahman
author_link: http://twitter.com/aphpdev
---

Laravel 8 introduced new model factories that are basically the same as before, but they are class-based and have some new additions.


Unfortunately, switching between different locales was not taken into account, and you have to define one locale in `config/app.php` using `faker_locale` every time you decide to test your app.


It would be great if the upcoming versions of Laravel included functions that run before making/creating models, next to `afterMaking`and`afterCreating`, or even better they could add something similar to Sequences but for switching between multiple locales.


Lately, I came across this dilemma, and I had to improvise; I'm still not happy with it, but it works and is the only solution we have right now.

```
class DummyFactory extends Factory
{
  public function definition()
  {
      $lang = ($langs = ['ar', 'en'])[array_rand($langs)];
      $this->faker = \Faker\Factory::create($lang == 'ar' ? 'ar_SA' : 'en_US');

      return [
            'language' => $lang,
            'title' => $this->faker->realTextBetween(40, 70),
            'content' => $this->faker->realTextBetween(500, 750),
          ];
   }
}
```

<br>

And voilà, it works for now.
