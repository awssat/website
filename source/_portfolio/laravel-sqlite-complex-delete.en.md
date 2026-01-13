---
title: "Fix SQLite Delete for Complex Statements"
type: "laravel-pr"
date: 1512518400
description: "Fixed a critical bug in Laravel's SQLite delete implementation that caused unintended data loss with complex DELETE statements"
tech_stack: ["Laravel", "PHP", "SQLite", "Database"]
github_url: "https://github.com/laravel/framework/pull/22298"
pr_number: 22298
pr_status: "merged"
author: "abdumu"
featured: true
locale: "en"
---

## Problem

The original SQLite delete implementation failed to handle complex DELETE statements involving joins or limits, potentially causing **unintended data loss**. For example:

```php
App\Post::latest('id')->limit(1)->delete();
// Result: 48 deleted rows (instead of 1) ❌
```

This would delete **all rows** from the table regardless of WHERE clauses or limits!

## Solution

The fix uses a subquery with `rowid` to target only the specific rows:

```php
delete from "posts" where "rowid" in
  (select "posts"."rowid" from "posts"
   order by "id" desc limit 1)
// Result: 1 deleted row (correct) ✓
```

The implementation leverages SQLite's `rowid` to accurately identify and delete only the intended records when complex operations like ordering and limiting are present.

## Impact

This prevents catastrophic data loss and ensures SQLite delete operations work correctly with limits, joins, and other complex conditions. Integration tests were added to validate the fix across multiple scenarios.

**Merged:** December 6, 2017
