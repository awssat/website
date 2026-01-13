---
title: "إصلاح حذف SQLite للجمل المعقدة"
type: "laravel-pr"
date: 1512518400
description: "إصلاح خطأ حرج في تنفيذ حذف SQLite في Laravel تسبب في فقدان بيانات غير مقصود مع جمل DELETE المعقدة"
tech_stack: ["Laravel", "PHP", "SQLite", "Database"]
github_url: "https://github.com/laravel/framework/pull/22298"
pr_number: 22298
pr_status: "merged"
author: "abdumu"
featured: true
locale: "ar"
---

## المشكلة

فشل تنفيذ حذف SQLite الأصلي في التعامل مع جمل DELETE المعقدة التي تتضمن عمليات join أو حدود، مما تسبب في **فقدان بيانات غير مقصود**. على سبيل المثال:

```php
App\Post::latest('id')->limit(1)->delete();
// النتيجة: حذف 48 صف (بدلاً من 1) ❌
```

كان هذا يحذف **جميع الصفوف** من الجدول بغض النظر عن شروط WHERE أو الحدود!

## الحل

يستخدم الإصلاح استعلام فرعي مع `rowid` لاستهداف الصفوف المحددة فقط:

```php
delete from "posts" where "rowid" in
  (select "posts"."rowid" from "posts"
   order by "id" desc limit 1)
// النتيجة: حذف صف واحد (صحيح) ✓
```

يستفيد التنفيذ من `rowid` في SQLite لتحديد وحذف السجلات المقصودة فقط بدقة عند وجود عمليات معقدة مثل الترتيب والتحديد.

## التأثير

يمنع هذا فقدان البيانات الكارثي ويضمن أن عمليات حذف SQLite تعمل بشكل صحيح مع الحدود والربطات والشروط المعقدة الأخرى. تمت إضافة اختبارات تكامل للتحقق من الإصلاح عبر سيناريوهات متعددة.

**تم الدمج:** 6 ديسمبر 2017
