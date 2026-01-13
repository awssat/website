---
title: "Fix SQLite Update for Complex Statements"
type: "laravel-pr"
date: 1513382400
description: "Fixed SQLite update functionality to handle complex statements involving joins and limit clauses"
tech_stack: ["Laravel", "PHP", "SQLite", "Database"]
github_url: "https://github.com/laravel/framework/pull/22366"
pr_number: 22366
pr_status: "merged"
author: "abdumu"
featured: true
locale: "en"
---

## Problem

The current SQLite update implementation lacked support for complex statements like joins or limits. Additionally, SQLite's UPDATE syntax doesn't support qualified column names (prefixed table references).

## Solution

This fix enables SQLite update queries to handle more sophisticated statements, specifically those involving joins and limit clauses. The implementation uses string manipulation to strip qualified column name prefixes before executing the update, since SQLite doesn't support them in UPDATE statements.

## Impact

Laravel developers can now use complex UPDATE queries with SQLite databases, including those with joins and limits, without encountering errors or unexpected behavior.

**Merged:** December 16, 2017
