---
title: "تفعيل تسجيل Pusher"
type: "laravel-pr"
date: 1531612800
description: "إضافة دعم لتسجيل Pusher في Laravel 5.7، مما يسمح للمطورين بتكوين التسجيل من خلال ملف تكوين البث"
tech_stack: ["Laravel", "PHP", "Pusher", "Broadcasting"]
github_url: "https://github.com/laravel/framework/pull/24840"
pr_number: 24840
pr_status: "merged"
author: "abdumu"
featured: false
locale: "ar"
---

## المشكلة

إصدار Pusher 3.0.0 وما بعده متوافق مع PSR ويدعم التسجيل، لكن Laravel لم يوفر طريقة لتفعيل هذه الوظيفة بسهولة.

## الحل

تضيف هذه المساهمة دعماً لتسجيل Pusher في Laravel 5.7. بدلاً من التحقق من إصدار Pusher في وقت التشغيل، يسمح التنفيذ للمطورين بتكوين التسجيل من خلال متغير `log` في تكوين برنامج تشغيل Pusher في ملف `config/broadcasting.php`.

## التأثير

يمكن للمطورين الآن تفعيل أو تعطيل تسجيل Pusher من خلال التكوين، مما يسهل تصحيح أخطاء البث في الوقت الفعلي في تطبيقات Laravel.

**تم الدمج:** 15 يوليو 2018
