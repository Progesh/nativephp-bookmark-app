# 🔖 Bookmark Desktop App

A lightweight desktop application for managing your URL bookmarks, built with **Laravel**, **NativePHP**, and **SQLite**. This app runs as a native desktop app using the power of web technologies — combining Laravel's backend with NativePHP's Electron integration.

---

## 🚀 Features

- Add, edit and delete URL bookmarks
- Add, edit and delete Categories 
- Simple and responsive UI
- Local SQLite database for fast and lightweight storage
- Native desktop app (cross-platform ready)
- Built using Laravel & NativePHP

---

## 🛠️ Tech Stack

- [Laravel](https://laravel.com/) 10.x
- [NativePHP](https://nativephp.com/)
- [Electron](https://www.electronjs.org/)
- [SQLite](https://www.sqlite.org/)
- PHP 8.2 or higher
- Node.js (for Electron build)

---

## 📦 Requirements

Before running or building the app, make sure you have:

- PHP >= 8.2
- Composer
- Node.js >= 18.x and npm
- SQLite3
- Git

---

## 📥 Installation

Clone the repository:

```bash
git clone https://github.com/Progesh/nativephp-bookmark-app.git
cd nativephp-bookmark-app

composer install
npm install
cp .env.example .env
# Configure your .env file as needed (e.g., database settings)
php artisan key:generate
touch database/database.sqlite
php artisan migrate
```

---

## 🧪 Run the App (Development Mode)

```bash
npm run build
php artisan native:serve
```

---

## 📦 Build the App (Production)

```bash
php artisan native:build
```
