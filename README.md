Perfect 👍
Below is a **FULL, CLEAN, READY-TO-PUBLISH README.md** for your package, written **end-to-end**, inspired by **ML Environment Doctor**, but **correctly adapted to Laravel + Docker + Permissions + Execution Context**.

You can **copy-paste this directly** into `README.md` in
`permissionchecker/laravel-env-checker`.

---

# 🔍 Laravel Environment Checker

**Laravel 10–12 · PHP 8.1+ · Docker-Aware · MIT License**

> A single Artisan command to diagnose **Docker**, **permissions**, **execution context**, and **database** issues in Laravel applications — before they break your app.

---

## 🎯 Why Laravel Environment Checker?

### The Problem

Laravel projects frequently break due to:

* Running `php artisan` **outside Docker**
* Incorrect **file permissions** (`storage`, `bootstrap/cache`)
* Database container not reachable
* Mixed **host vs container execution**
* Root vs non-root ownership conflicts
* Apps crashing with **500 errors** after install

These issues are scattered across:

* StackOverflow answers
* GitHub issues
* Trial-and-error debugging

⏱️ **Hours wasted on avoidable mistakes**

---

### The Solution

**ONE Artisan command** that:

✅ Detects Docker usage
✅ Verifies execution context (host vs container)
✅ Checks permissions safely
✅ Validates database connectivity
✅ Blocks dangerous commands before damage
✅ Guides users with **exact fix commands**

---

## 🚀 Quick Start

### 📦 Install

```bash
composer require permissionchecker/laravel-env-checker
```

> If installing a development version:

```bash
composer require permissionchecker/laravel-env-checker:"@dev"
```

---

### 🔍 Diagnose your environment

```bash
php artisan env:check
```

---

### 🐳 If your app runs in Docker

```bash
docker-compose exec app php artisan env:check
```

---

## 📋 What `env:check` Does

```text
[ ✔ ] Environment — PHP version is compatible
[ ⚠ ] Docker — Docker detected but Artisan running on host
[ ✖ ] Execution Context — Artisan executed on host while Laravel runs in Docker
    → docker-compose exec app php artisan <command>

Blocked to prevent damage.
```

✔ Stops you **before** running dangerous commands
✔ Never modifies files
✔ Read-only diagnostics

---

## 🧠 How It Works

Laravel Environment Checker runs **non-destructive checks**:

| Check             | Purpose                       |
| ----------------- | ----------------------------- |
| Environment       | PHP & Laravel compatibility   |
| Docker            | Detect Docker runtime         |
| Execution Context | Prevent host/container misuse |
| Permissions       | Writable directories          |
| Database          | DB connection validation      |

---

## 📚 Command Reference

### 🔹 Full Scan (default)

```bash
php artisan env:check
```

Runs **all checks**.

---

### 🔹 Docker Checks Only

```bash
php artisan env:check docker
```

Checks:

* Docker detection
* Execution context
* Docker permissions

---

### 🔹 Permissions Only

```bash
php artisan env:check permissions
```

Checks:

* `storage/`
* `bootstrap/cache`
* Ownership mismatches

---

### 🔹 Database Only

```bash
php artisan env:check database
```

Checks:

* DB_HOST
* DB_PORT
* Docker service name
* Connection availability

---

### 🔹 Environment Only

```bash
php artisan env:check environment
```

Checks:

* PHP version
* Laravel compatibility

---

## 🐳 Docker Usage (Important)

If Laravel runs in Docker, **always use**:

```bash
docker-compose exec app php artisan <command>
```

❌ Wrong:

```bash
php artisan migrate
```

✅ Correct:

```bash
docker-compose exec app php artisan migrate
```

Laravel Environment Checker **detects and warns** if you forget.

---

## 🛡️ Safety Guarantees

✔ No file permission changes
✔ No database writes
✔ No config edits
✔ No migrations
✔ No destructive actions

> This tool is **diagnostic only**

---

## 🎯 Use Cases

* Fresh Laravel setup
* Docker-based development
* CI/CD pipelines
* Preventing permission-related 500 errors
* Onboarding new developers
* Production sanity checks

---

## 🧪 Example Output

```text
Laravel Environment Check

[ ✔ ] Environment — PHP version is compatible
[ ⚠ ] Docker — Docker detected but Artisan running on host
[ ✖ ] Execution Context — Artisan executed on host while Laravel runs in Docker
    → docker-compose exec app php artisan env:check
[ ✔ ] Permissions — Required directories are writable
[ ✖ ] Database — Database connection failed
    → Check DB_HOST, DB_PORT, Docker service name

✔ Environment check completed
```

---


Run locally inside a Laravel app using a **path repository**.

---

## 🤝 Contributing

Contributions welcome!

1. Fork the repo
2. Create a branch

   ```bash
   git checkout -b feature/amazing-check
   ```
3. Commit changes
4. Open a Pull Request

---

## 📄 License

MIT License — see `LICENSE` file.

---

## 🙏 Acknowledgments

Inspired by:

* Docker + Laravel pain points
* Real-world production failures
* Tools like **ML Environment Doctor**

---

## ⭐ Star the Project

If this tool saved you time, please ⭐ star the repository.

---

### Made with ❤️ for the Laravel + Docker community

---


