# AI-Solutions — Company Website & Admin Portal

A complete **Laravel** website for the fictitious startup **AI-Solutions** (Sunderland, UK).
It showcases the company's AI software solutions, industry case studies, customer
testimonials, articles, photo gallery and events. Visitors can send enquiries through a
**Contact Us** form, chat with an **AI-powered assistant**, and staff can log into a
**password-protected admin area** to view enquiries and manage content.

> This README is written for **complete beginners**. If you have never used PHP, Laravel,
> Composer or MySQL before, follow every step in order and you will get the site running.

---

## Table of Contents

1. [What this project includes](#1-what-this-project-includes)
2. [What you need to install first](#2-what-you-need-to-install-first-prerequisites)
3. [Getting the project files](#3-getting-the-project-files)
4. [Step-by-step setup](#4-step-by-step-setup)
5. [Running the website](#5-running-the-website)
6. [Logging into the admin area](#6-logging-into-the-admin-area)
7. [The AI chatbot (DeepSeek)](#7-the-ai-chatbot-deepseek)
8. [Project structure explained](#8-project-structure-explained)
9. [Common commands cheat sheet](#9-common-commands-cheat-sheet)
10. [Troubleshooting](#10-troubleshooting)

---

## 1. What this project includes

**Public website pages**

| Page | URL | What it shows |
|------|-----|---------------|
| Home | `/` | Hero, services, industries, testimonials carousel, latest articles, events |
| Services | `/services` | AI software solutions offered + how we work |
| Industries | `/industries` | Case studies across sectors |
| Testimonials | `/testimonials` | Client feedback with star ratings |
| Articles | `/articles` | Blog / news articles (with detail pages) |
| Gallery | `/gallery` | Event photos with a lightbox and filters |
| Events | `/events` | Upcoming and past events |
| Contact | `/contact` | Enquiry form (no account needed) |

**Admin portal** (login required) — at `/admin/login`

- Dashboard with enquiry statistics (total, unread, today, this month) + a chart
- View & read customer enquiries
- Add / edit / delete **Testimonials**
- Add / edit / delete **Articles** (with image upload and draft/publish)

**AI chatbot** — a floating chat widget on every public page, powered by DeepSeek.

**Technology used**

- **Laravel 13** (PHP framework) · **PHP 8.3+**
- **MySQL** database
- **Blade** templates + **Bootstrap 5** (loaded via CDN — no build step required)
- **DeepSeek API** for the chatbot

---

## 2. What you need to install first (Prerequisites)

Install these three things on your computer **before** doing anything else.

### a) PHP (version 8.3 or newer)

PHP is the language Laravel runs on.

- **Windows:** the easiest option is [Laravel Herd](https://herd.laravel.com/windows)
  (it bundles PHP + Composer), **or** [XAMPP](https://www.apachefriends.org/) which includes
  PHP and MySQL together.
- **Mac:** install [Laravel Herd for Mac](https://herd.laravel.com/) or use Homebrew:
  `brew install php`
- **Check it worked** — open a terminal and run:
  ```bash
  php --version
  ```
  You should see `PHP 8.3` (or higher).

### b) Composer (PHP's package manager)

Composer downloads the Laravel framework and other code the project depends on.

- Download from [getcomposer.org/download](https://getcomposer.org/download/)
- **Check it worked:**
  ```bash
  composer --version
  ```

### c) MySQL (the database)

This is where all the website data (enquiries, articles, etc.) is stored.

- **Easiest for beginners:** install [XAMPP](https://www.apachefriends.org/) — it gives you
  MySQL **and** a visual database tool called **phpMyAdmin**.
- Alternatives: [MySQL Community Server](https://dev.mysql.com/downloads/mysql/) or
  [Laragon](https://laragon.org/) (Windows).
- After installing, **start the MySQL service** (in XAMPP: open the Control Panel and click
  **Start** next to "MySQL").

> **Optional:** [Node.js](https://nodejs.org/) is only needed if you want to change build
> assets. This project loads Bootstrap from a CDN, so **you do not need Node.js just to run
> the site.**

---

## 3. Getting the project files

If you received the project as a **ZIP file**, unzip it to a folder you can find easily, for
example:

```
D:\projects\ai-solutions
```

If you are using **Git**:

```bash
git clone <repository-url> ai-solutions
cd ai-solutions
```

Then open a terminal **inside the project folder** (the folder that contains this `README.md`
and the `artisan` file). In VS Code you can do this with **Terminal → New Terminal**.

> Every command below must be run from inside the project folder.

---

## 4. Step-by-step setup

Do these steps **in order**. Copy and paste each command exactly.

### Step 1 — Install the PHP dependencies

This downloads the Laravel framework into a `vendor/` folder.

```bash
composer install
```

> This can take a minute or two the first time. Wait for it to finish.

### Step 2 — Create your configuration file (`.env`)

The project ships with a template called `.env.example`. Make a copy of it named `.env`.

- **Windows (PowerShell):**
  ```powershell
  Copy-Item .env.example .env
  ```
- **Mac / Linux:**
  ```bash
  cp .env.example .env
  ```

The `.env` file holds settings like your database name and passwords. **It is private** and
should never be shared or committed to Git.

### Step 3 — Generate the application key

Laravel needs a unique secret key to encrypt data securely.

```bash
php artisan key:generate
```

You should see: *"Application key set successfully."*

### Step 4 — Create the database

1. Start MySQL (e.g. in the XAMPP Control Panel, click **Start** next to MySQL).
2. Open **phpMyAdmin** (in XAMPP, click **Admin** next to MySQL — it opens
   `http://localhost/phpmyadmin` in your browser).
3. Click **New** in the left sidebar.
4. Type the database name **`ai_solutions`** and click **Create**.

   > You do **not** need to create any tables — Laravel does that for you in Step 6.

### Step 5 — Tell the project how to connect to your database

Open the `.env` file in a text editor (VS Code, Notepad, etc.) and find this section.
Edit it to match **your** MySQL setup:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ai_solutions
DB_USERNAME=root
DB_PASSWORD=
```

- `DB_DATABASE` must match the name you created in Step 4 (`ai_solutions`).
- `DB_USERNAME` is usually `root` on a fresh XAMPP install.
- `DB_PASSWORD` is usually **empty** on XAMPP (leave it blank). If you set a MySQL password,
  put it here.

Save the file.

### Step 6 — Create the tables and add sample data

This single command builds all the database tables **and** fills them with example
services, industries, testimonials, articles, events, and the admin login account:

```bash
php artisan migrate --seed
```

- `migrate` = create the tables.
- `--seed`  = insert the starter/sample data.

If it asks *"Are you sure?"*, type `yes` and press Enter.

> ✅ This also creates your admin account — see [section 6](#6-logging-into-the-admin-area).

### Step 7 — Link the storage folder (for uploaded images)

Uploaded images (like article photos) are saved in a private folder. This command creates a
shortcut so the browser can display them:

```bash
php artisan storage:link
```

You should see: *"The links have been created."*

### Step 8 — (Optional) Add your AI chatbot key

The floating chat assistant uses the DeepSeek AI service. To enable it:

1. Create an account at [platform.deepseek.com](https://platform.deepseek.com) and create an
   **API key** (and add a small amount of credit — the API is not free).
2. Open `.env` and paste your key:
   ```env
   DEEPSEEK_API_KEY=sk-your-key-here
   ```
3. Save, then refresh the config:
   ```bash
   php artisan config:clear
   ```

> If you leave this blank, the website still works perfectly — the chatbot will simply show a
> polite "temporarily offline" message.

---

## 5. Running the website

Start Laravel's built-in web server:

```bash
php artisan serve
```

You will see something like:

```
INFO  Server running on [http://127.0.0.1:8000].
```

Open your browser and go to:

👉 **http://localhost:8000**

The AI-Solutions homepage should appear. 🎉

> To **stop** the server, click in the terminal and press **Ctrl + C**.

---

## 6. Logging into the admin area

The admin login account is created automatically by the seeder in Step 6.

1. Go to **http://localhost:8000/admin/login**
   (or scroll to the website footer and click the small **Admin** link).
2. Log in with:

   | Field | Value |
   |-------|-------|
   | **Email** | `admin@ai-solutions.co.uk` |
   | **Password** | `Admin@2025` |

3. You will land on the **Dashboard**, where you can see enquiry stats and manage
   testimonials and articles from the sidebar.

> **Security note:** these are default demo credentials. For a real/live website, change the
> password. You can create a different admin by editing
> `database/seeders/AdminSeeder.php` and re-running
> `php artisan db:seed --class=AdminSeeder`.

---

## 7. The AI chatbot (DeepSeek)

- The chat button appears in the **bottom-right corner** of every public page.
- It answers visitor questions about AI-Solutions' services, industries and how to get in
  touch, then encourages them to use the Contact form.
- Your API key stays **safe on the server** — it is never shown in the browser. The browser
  talks to a Laravel route (`/chatbot`), and Laravel talks to DeepSeek.
- Requests are rate-limited (30 messages per minute per visitor) to prevent abuse.

If the chatbot says it is "temporarily offline", it usually means the `DEEPSEEK_API_KEY` is
missing **or** the DeepSeek account has no credit.

---

## 8. Project structure explained

You will mostly work inside these folders:

```
website - portfolio/
├── app/
│   ├── Http/Controllers/         ← Code that handles each page/request
│   │   ├── Admin/                ← Admin: Auth, Dashboard, Testimonials, Articles
│   │   ├── ChatbotController.php ← Talks to the DeepSeek AI
│   │   ├── ContactController.php ← Handles the Contact Us form
│   │   └── ...                   ← Home, Services, Articles, Gallery, Events, etc.
│   └── Models/                   ← One file per database table (Article, Event, …)
│
├── resources/views/              ← The HTML pages (Blade templates)
│   ├── layouts/
│   │   ├── app.blade.php          ← Public site shell (navbar, footer, chatbot, styles)
│   │   └── admin.blade.php        ← Admin shell (sidebar, topbar)
│   ├── admin/                     ← Admin pages (dashboard, login, testimonials, articles)
│   ├── articles/                  ← Article list + detail pages
│   ├── home.blade.php, contact.blade.php, ...
│
├── routes/
│   └── web.php                    ← The list of all URLs and which controller handles them
│
├── database/
│   ├── migrations/                ← Definitions of the database tables
│   └── seeders/                   ← Sample data + the admin account
│
├── public/                        ← The web root (entry point: index.php)
├── storage/                       ← Uploaded files & logs
├── .env                           ← YOUR private settings (database, API keys)
└── artisan                        ← Laravel's command-line tool
```

**How a page works (in plain English):** a visitor opens a URL → `routes/web.php` decides
which **Controller** handles it → the Controller gets data from a **Model** (database) →
and shows it using a **Blade view** (the HTML).

---

## 9. Common commands cheat sheet

Run these from inside the project folder:

| Command | What it does |
|---------|--------------|
| `php artisan serve` | Start the website (http://localhost:8000) |
| `php artisan migrate` | Create/update database tables |
| `php artisan migrate --seed` | Create tables **and** add sample data |
| `php artisan migrate:fresh --seed` | ⚠️ **Erase everything** and rebuild with fresh sample data |
| `php artisan db:seed` | Re-add sample data only |
| `php artisan storage:link` | Make uploaded images viewable |
| `php artisan config:clear` | Reload settings after editing `.env` |
| `php artisan route:list` | Show every URL in the project |

> **After editing `.env`**, always run `php artisan config:clear` so your changes take effect.

---

## 10. Troubleshooting

**"could not find driver" / database connection errors**
- Make sure MySQL is **running** (XAMPP → Start MySQL).
- Check the `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` values in `.env` are correct.
- Make sure the `ai_solutions` database exists in phpMyAdmin.
- Run `php artisan config:clear` and try again.

**"Application key not set" or scrambled pages**
- Run `php artisan key:generate`.

**The page says "404" or "route not found"**
- Make sure you are visiting `http://localhost:8000` (the address shown by `php artisan serve`).

**Uploaded images don't show (broken image icon)**
- Run `php artisan storage:link`.

**I changed `.env` but nothing changed**
- Run `php artisan config:clear`, then restart `php artisan serve`.

**"Port 8000 is already in use"**
- Start on a different port: `php artisan serve --port=8001`
  (then open `http://localhost:8001`).

**The chatbot doesn't reply**
- Check `DEEPSEEK_API_KEY` is set in `.env`, run `php artisan config:clear`, and make sure
  your DeepSeek account has credit.

**I want to start the database over from scratch**
- ⚠️ This deletes all data: `php artisan migrate:fresh --seed`

---

### Quick start (for people in a hurry)

```bash
composer install
cp .env.example .env          # Windows: Copy-Item .env.example .env
php artisan key:generate
# → create the "ai_solutions" database in phpMyAdmin, then set DB_* in .env
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Then open **http://localhost:8000** · Admin at **/admin/login**
(`admin@ai-solutions.co.uk` / `Admin@2025`).

---

## Developer

**Ritika Karn**
Pursuing Bachelor's degree at **ISMT College**

---

*Built with Laravel · AI-Solutions assessment project.*
