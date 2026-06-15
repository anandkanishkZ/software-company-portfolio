# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# First-time setup (install, key, migrate, npm build)
composer run setup

# Development (starts server + queue + pail log watcher + vite in parallel)
composer run dev

# Run all tests
composer run test

# Run a single test file
php artisan test --filter=ExampleTest

# Code formatting (Laravel Pint)
./vendor/bin/pint

# Migrate and seed
php artisan migrate
php artisan db:seed

# Create admin user (run tinker)
php artisan tinker
# >>> \App\Models\Admin::create(['name'=>'Admin','email'=>'admin@ai-solutions.co.uk','password'=>bcrypt('Admin@2025')])
```

## Environment

- **DB:** MySQL 8.0, database `ai_solutions`, credentials in `.env` (`root`/`admin123`)
- **DeepSeek API key:** `DEEPSEEK_API_KEY` in `.env` — maps via `config/services.php` to `services.deepseek.key`
- **SSL cert:** `storage/cacert.pem` is required for cURL TLS verification in the chatbot
- **Dev URL:** `http://127.0.0.1:8000`

## Architecture

### Public site
All public pages follow the same pattern: a thin controller fetches from the DB and passes to a Blade view. The layout is `resources/views/layouts/app.blade.php` (Bootstrap 5 + Bootstrap Icons, Inter font — all via CDN; no Vite assets for the frontend). The chatbot widget and navbar are embedded directly in `app.blade.php`.

### Admin panel
- Route prefix: `/admin`, route name prefix: `admin.`
- Auth uses a **custom session-based guard** (`session('admin_logged_in')`), not Laravel's built-in Auth. The `AdminAuth` middleware (`app/Http/Middleware/AdminAuth.php`) checks this session key.
- Admin users live in the `admins` table (`App\Models\Admin`), separate from `users`.
- Admin layout: `resources/views/layouts/admin.blade.php`.
- Admin controllers live in `app/Http/Controllers/Admin/`.

### Content models and DB tables

| Model | Table | Notes |
|---|---|---|
| `Service` | `services` | `title`, `description`, `icon` (Bootstrap Icon class), `sort_order` |
| `Industry` | `industries` | similar to Service |
| `Testimonial` | `testimonials` | `client_name`, `company`, `job_title`, `rating` (1–5), `feedback`, `avatar` |
| `Article` | `articles` | `slug` (route key), `published_at` nullable (null = draft) |
| `GalleryImage` | `gallery_images` | `image_path`, `event_name`, `sort_order` |
| `Event` | `events` | `event_date` datetime, `link` nullable |
| `Contact` | `contacts` | inquiry form submissions; `is_read` boolean |
| `Admin` | `admins` | admin credentials only |

`Article` uses `slug` as the route model binding key (`getRouteKeyName()`).

### Chatbot (`ChatbotController`)
Calls the DeepSeek API (`https://api.deepseek.com/chat/completions`, model `deepseek-v4-flash`). On Windows, PHP's cURL DNS resolver fails to resolve `api.deepseek.com` even when the OS can. The workaround pre-resolves the host via `gethostbyname()` and passes the IP to cURL via `CURLOPT_RESOLVE`. Rate-limited to 30 requests/minute per IP via `RateLimiter`.

### What's DB-driven vs hardcoded
- **DB-driven:** Services, Industries, Testimonials, Articles, Gallery, Events, Contacts
- **Hardcoded in Blade:** Hero text, stat counters (200+ projects, 98% satisfaction), footer content, navbar links, contact page details (address/phone/email)

### Admin CRUD status (as of initial commit)
Full CRUD is implemented for **Testimonials** and **Articles** only. Services, Industries, Gallery, and Events have models and migrations but no admin CRUD routes or views yet.
