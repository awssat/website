---
title: "Enable Pusher Logging"
type: "laravel-pr"
date: 1531612800
description: "Added support for Pusher logging in Laravel 5.7, allowing developers to configure logging through the broadcasting configuration file"
tech_stack: ["Laravel", "PHP", "Pusher", "Broadcasting"]
github_url: "https://github.com/laravel/framework/pull/24840"
pr_number: 24840
pr_status: "merged"
author: "abdumu"
featured: false
locale: "en"
---

## Problem

Pusher version 3.0.0 and later is PSR-compatible and supports logging, but Laravel didn't provide a way to enable this functionality easily.

## Solution

This contribution adds support for Pusher logging in Laravel 5.7. Rather than checking the Pusher version at runtime, the implementation allows developers to configure logging through a `log` variable in the `config/broadcasting.php` file's Pusher driver configuration.

## Impact

Developers can now enable or disable Pusher logging through configuration, making it easier to debug real-time broadcasting issues in Laravel applications.

**Merged:** July 15, 2018
