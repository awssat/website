---
title: "إصلاح تكرار البادئة في hasColumn لـ SQLite"
type: "laravel-pr"
date: 1512604800
description: "إصلاح خطأ حيث كانت بادئة الجدول تتكرر في طريقة hasColumn لـ SQLite"
tech_stack: ["Laravel", "PHP", "SQLite", "Database"]
github_url: "https://github.com/laravel/framework/pull/22340"
pr_number: 22340
pr_status: "merged"
author: "abdumu"
featured: false
locale: "ar"
---

## المشكلة

في طريقة hasColumn لـ SQLite، كانت بادئة الجدول تتكرر. على سبيل المثال، مع بادئة "test_" واسم جدول "posts"، كانت النتيجة تُنتج بشكل غير صحيح "test_test_posts" بدلاً من "test_posts".

## الحل

يزيل الإصلاح تطبيق البادئة الزائدة، مما يضمن تطبيق بادئة الجدول مرة واحدة فقط على اسم الجدول.

## التأثير

يحل هذا المشكلة #18255 ويضمن حل اسم الجدول بشكل صحيح عند التحقق من وجود عمود في قواعد بيانات SQLite ذات بادئات الجداول.

**تم الدمج:** 7 ديسمبر 2017
**يُغلق:** #18255
