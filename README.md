# 🔍 Laravel Environment Inspector

**Laravel 10–12 · PHP 8.1+ · MIT License**

> One-time install. One command. Diagnose Laravel + Docker + permission issues before they break your application.

---

## 🎯 What is Laravel Environment Inspector?

**Laravel Environment Inspector** is a **safe, read-only Artisan CLI package** that helps developers diagnose **environment, Docker, permission, database, and execution-context issues** in Laravel applications.

It focuses on **why Laravel fails**, not on modifying your system or code.

Inspired by tools like `mlenvdoctor`, but built **specifically for Laravel**.

---

## ❗ Why this package exists

Laravel applications often fail because of:

- Running Artisan commands on the host while Laravel runs in Docker
- Incorrect permissions on `storage/` and `bootstrap/cache`
- Database connection issues inside containers
- Environment mismatches causing 500 errors
- Confusing permission-denied and ownership problems

These are **environment problems**, not application bugs — but they waste hours of debugging.

---

## ✅ What this package does

✔ Detects Docker usage  
✔ Detects unsafe execution context  
✔ Checks directory permissions  
✔ Verifies database connectivity  
✔ Explains problems in plain English  
✔ Suggests **safe commands** to fix them  
✔ Blocks dangerous execution when required  

🚫 Never auto-fixes  
🚫 Never changes permissions  
🚫 Never modifies files  
🚫 Never affects web requests  

---

## 🚀 Installation

```bash
composer require permissionchecker/laravel-env-checker
