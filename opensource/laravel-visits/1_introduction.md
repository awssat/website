---
prev: ./
next: 2_requirements
---

# Introduction
Laravel Visits is a counter that can be attached to any model to track its visits with useful features like IP-protection and lists caching.




## Features
- A model item can have many types of recorded visits (using tags).
- It's not limited to one type of Model (like some packages that allow only User model).
- Record per visitors and not by vistis using IP detecting, so even with refresh, visit won't duplicate (can be changed from config). 
- Get Top/Lowest visits per a model.
- Get most visited countries, refs, OSes, and languages.
- Get visits per a period of time like a month of a year of an item or model.
- Supports multiple data engines: Redis or database (any SQL engine that Eloquent supports). 
