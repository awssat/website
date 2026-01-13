---
title: "Fix SQLite hasColumn Duplicated Prefix"
type: "laravel-pr"
date: 1512604800
description: "Fixed a bug where the table prefix was being duplicated in SQLite's hasColumn method"
tech_stack: ["Laravel", "PHP", "SQLite", "Database"]
github_url: "https://github.com/laravel/framework/pull/22340"
pr_number: 22340
pr_status: "merged"
author: "abdumu"
featured: false
locale: "en"
---

## Problem

In SQLite's hasColumn method, the table prefix was being duplicated. For example, with a prefix of "test_" and table name "posts", the result would incorrectly produce "test_test_posts" instead of "test_posts".

## Solution

The fix eliminates redundant prefix application, ensuring that the table prefix is only applied once to the table name.

## Impact

This resolves issue #18255 and ensures correct table name resolution when checking for column existence in SQLite databases with table prefixes.

**Merged:** December 7, 2017
**Closes:** #18255
