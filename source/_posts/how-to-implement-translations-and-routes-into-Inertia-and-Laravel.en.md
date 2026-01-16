---
title: How to implement translations and routes into Inertia and Laravel
date: 2022-04-18
description: use routes and translations in InertiaJS and Laravel
tags: [php, laravel]
author: Abdulrahman
author_link: http://twitter.com/aphpdev
---

InertiaJS is one of the fastest-growing JavaScript frameworks that help you make powerful, single-page apps. It comes included as one of the choices in Laravel Jetstream, a starter kit to help you build apps faster.

Most developers are not keen to write hard-coded translations and routes in their code because they're subject to changes. Unlike Blade templates, Inertia doesn't share the same flexibility as Blade templates by using Laravel helpers for routes and translations. In this post, we share our approach in Awssat that we have used in one of our apps lately.

We assume that you have already installed Inertia (Vue 3).

1. Create a new helper function in your functions/helpers.php file (create one if you didn't already) to fetch given translations.

```php
<?php
//...
function getTrans($items)
{
    return collect($items)->mapWithKeys(function ($item) {
        return [$item => __($item)];
    })->all();
}
//...
```

<br />
2. Share global routes and translations from your HandleInertiaRequests middleware (you don't need this if you don't have translations and routes that you want to share across all your pages).

```php
<?php
//......
//......

class HandleInertiaRequests extends Middleware
{
  //.....
  //.....
  
     public function share(Request $request)
     {
     
          return array_merge(parent::share($request), [
            //....
            //.....
            'rootTranslations' => getTrans([
                'pages.features',
                'pages.help',
                'pages.privacy_and_terms',
                'pages.contact',
                'pages.copyright',
                //....
            ]),
            'rootRoutes' => function () {
                return [
                    'logout' => route('logout'),
                    'login' => route('login'),
                    'home' => route('home'),
                ];
            },
        ]);

     }
}
```

<br />
3. Add a new Javascript helpers file so that we can add some new helpers to help us fetch translations and routes easily.

```js
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/runtime-core";

export function route(name, obj) {
    const routes = computed(() => usePage().props.value.routes);
    const rootRoutes = computed(() => usePage().props.value.rootRoutes);

    let url = optional(routes.value)[name] || optional(rootRoutes.value)[name];
    if (typeof url === undefined || !url || url === null) {
        return name;
    }

    let params = url.matchAll(/__(\w+)\.(\w+)__/g);

    for (let result of params) {
        if (obj && obj.hasOwnProperty(result[1])) {
            url = url.replace(result[0], obj[result[1]][result[2]]);
        }
    }
    return url;
}

export function optional(variable, def = {}) {
    return typeof variable === undefined || variable === null || variable === undefined ? def : variable;
}

export function t(key, replace) {
    const translations = computed(() => {
        return { ...(usePage().props.value.rootTranslations || {}), ...(usePage().props.value.translations || {}) };
    });

    let translation = optional(translations.value)[key] || key;

    if (replace !== null && typeof replace !== "undefined") {
        const regex = new RegExp(":(" + Object.keys(replace).join("|") + ")", "g");
        return translation.replace(regex, (m, $1) => replace[$1] || m);
    }
    return translation.replace("&", "&");
}

export default {
    route,
    optional,
    t,
};
```

<br />
4. From any Laravel controller, return your routes and translations as you would any other information you would pass to Inertia.

```php
<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AboutController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('About', [
            'routes' => [
                'register' => route('register'),
                'terms' => route('terms'),
            ],
            'translations' => getTrans([
                'pages.about',
                'features.title',
                'features.body'
            ]),
        ]);
    }
}  
```

<br />
5. Then finaly, from your Vue3 component, import the new Javascript helpers and use them.

```js
<script setup>import {(route, t)} from '@/helpers.js';</script>
//html
<h4 class="font-bold my-2">{{ t('features.title') }}</h4>
<inertia-link :href="route('help')">{{ t('features.help') }}<inertia-link></inertia-link></inertia-link>
```

Enjoy.
