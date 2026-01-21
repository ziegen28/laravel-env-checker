# 🔍 Laravel Environment Inspector

**Laravel 10–12 · PHP 8.1+ · MIT License**

> One-time install. One command. Diagnose Laravel + Docker + permission issues before they break your app.

---

## 🎯 What is Laravel Environment Inspector?

Laravel Environment Inspector is a **safe, read-only Artisan CLI tool** that helps developers diagnose **environment, Docker, permission, and execution-context problems** in Laravel applications.

It focuses on **why Laravel fails**, not how to rewrite code.


---

## ❗ Why this package exists

Laravel apps often fail due to:
- Running Artisan commands on the host while the app runs in Docker
- Incorrect file ownership (`storage`, `bootstrap/cache`)
- Database connectivity issues in containers
- Environment mismatches causing 500 errors
- Confusing permission errors during deployment

These issues waste hours and are often mistaken for application bugs.

---

## ✅ What this package does

✔ Detects Docker usage  
✔ Detects unsafe execution context  
✔ Checks directory permissions  
✔ Verifies database connectivity  
✔ Explains issues clearly  
✔ Suggests **safe commands to fix them**  
✔ Prevents dangerous execution when required  

🚫 It never auto-fixes  
🚫 It never modifies files  
🚫 It never affects web requests  

---

## 🚀 Installation

```bash
composer require permissionchecker/laravel-env-checker
