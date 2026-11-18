<div align="center">

# 🔐 SafeLogin — Full-Stack PHP & MySQL Login Manager

A modern, responsive user authentication and registration portal built with **PHP** and **MySQL**, designed to seamlessly run both locally (XAMPP) and in production on cloud platforms like **Railway**.

[![Live Demo](https://img.shields.io/badge/Demo-Live_Website-success?style=for-the-badge&logo=railway&logoColor=white)](https://login-manager-production.up.railway.app)
[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)](LICENSE)

<br/>

[🚀 Live Demo](https://login-manager-production.up.railway.app) • [✨ Features](#-features) • [💻 Local Setup](#-local-development-setup) • [☁️ Deployment](#-cloud-deployment-railway) • [🗺️ Roadmap](#-roadmap)

</div>

---

## 🌟 Overview

SafeLogin is a lightweight, responsive login and user registration management application. It features dynamic environment switching that automatically detects whether it is running on a local development server or in the cloud.

### 🎯 Key Highlights
* **🌐 Cloud-Ready:** Production-deployed on Railway with auto-deploy pipelines via GitHub.
* **🔄 Dual-Environment Engine:** Seamlessly connects to local XAMPP (`localhost`) or cloud database instances via environment variables without modifying source code.
* **🛡️ Input Sanitization:** Form inputs are sanitized using PHP's native `filter_input()` filters.
* **📱 Responsive UI:** Clean glassmorphism-inspired design with FontAwesome icons, responsive on both mobile and desktop.

---

## 🛠️ Tech Stack

| Component | Technology | Description |
|---|---|---|
| **Frontend** | HTML5, CSS3, FontAwesome | Custom styled responsive auth card |
| **Backend** | PHP 8.2+ | Form processing, sanitization, validation |
| **Database** | MySQL / MariaDB | Relational user credential storage |
| **Hosting** | Railway | Cloud container execution with Nixpacks |
| **VCS** | Git & GitHub | Source code management & CI/CD triggers |

---

## 🏗️ Architecture & Data Flow

```
[ User Browser ]
       │
       ▼  (POST /index.php)
[ PHP Application Engine ]
       │
       ├─► Input Validation & Sanitization (FILTER_SANITIZE_SPECIAL_CHARS)
       │
       ▼  (mysqli_connect via getenv() or localhost)
[ MySQL Database (login_database / USERNAME table) ]
       │
       ▼
[ Response Message: "you are registered" / validation error ]
```

---

## 💻 Local Development Setup

### 1. Clone the repository
```bash
git clone https://github.com/shivadars/login-manager.git
cd login-manager
```

### 2. Set up the Database
1. Start MySQL (e.g. via XAMPP Control Panel).
2. Open **phpMyAdmin** or MySQL CLI and run the schema in `schema.sql`:
```sql
CREATE DATABASE IF NOT EXISTS login_database;
USE login_database;

CREATE TABLE IF NOT EXISTS USERNAME (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Run the Local Development Server
```bash
php -S localhost:8000
```
Open **`http://localhost:8000`** in your browser.

---

## ☁️ Cloud Deployment (Railway)

This repository includes out-of-the-box configuration for [Railway](https://railway.com/):

* **`Procfile`**: Defines the web process `php -S 0.0.0.0:$PORT`.
* **`nixpacks.toml`**: Installs PHP 8.2 and the `mysqli` extension.
* **`composer.json`**: Declares environment dependencies.
* **`connection.php`**: Automatically reads `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, and `MYSQLDATABASE` injected by Railway.

---

## 🗺️ Roadmap & Future Enhancements

- [ ] **Password Hashing:** Upgrade plain text insertion to `password_hash()` with `PASSWORD_BCRYPT`.
- [ ] **Prepared Statements:** Implement parameterized queries with `mysqli_stmt` to maximize SQL injection defense.
- [ ] **Session Authentication:** Add `session_start()` and protected dashboard routing.
- [ ] **CSRF Protection:** Add anti-CSRF token verification on form submissions.

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

