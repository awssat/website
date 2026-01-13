---
title: "Fix Eloquent Collection Intersect"
type: "laravel-pr"
date: 1574380800
description: "Fixed a bug where the intersect method in Eloquent collections returned all values instead of an empty collection when called with null or empty arguments"
tech_stack: ["Laravel", "PHP", "Eloquent"]
github_url: "https://github.com/laravel/framework/pull/30652"
pr_number: 30652
pr_status: "merged"
author: "BSN4"
featured: true
locale: "en"
---

## Problem

The `intersect` method in Eloquent collections behaved incorrectly when called with empty or null values. Previously, it would return all collection values instead of an empty collection, which differed from the standard collection intersect behavior.

## Solution

This fix corrects the Eloquent collection's `intersect` method to properly return an empty collection when intersecting with null or empty arguments, aligning its behavior with the base Collection class implementation.

## Impact

This ensures consistent behavior across Laravel's collection classes and prevents unexpected results when working with Eloquent model collections.

**Merged:** November 22, 2019
**Closes:** #30626
