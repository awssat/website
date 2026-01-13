---
title: "Fix Route Helper with Custom Binding Key"
type: "laravel-pr"
date: 1586217600
description: "Fixed a bug where the route() helper function was generating incorrect URIs for routes utilizing custom binding keys"
tech_stack: ["Laravel", "PHP", "Routing"]
github_url: "https://github.com/laravel/framework/pull/32264"
pr_number: 32264
pr_status: "merged"
author: "BSN4"
featured: true
locale: "en"
---

## Problem

The `route()` helper function was generating incorrect URIs for routes that utilized custom binding keys. When routes were defined with non-standard binding key configurations, the helper would produce malformed URLs.

## Solution

This fix ensures that when routes are defined with custom binding keys, the route helper function properly generates the correct URI paths. The changes were made to the `src/Illuminate/Routing/Route.php` file to handle custom key bindings correctly.

## Impact

Developers can now use custom route model binding keys without worrying about incorrect URL generation. This is particularly useful when using non-primary keys for route model binding.

**Merged:** April 7, 2020
**Closes:** #32201
