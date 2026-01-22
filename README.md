<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



# 🏨 Hotel Management System (HMS)

A role-based **Hotel Management System** built with **Laravel 12**, designed to manage hotels, rooms, bookings, and audit logs with strict authorization rules.

---

## 📌 Features

### 🔐 Authentication & Authorization
- Laravel Breeze (Blade)
- Role-based access control:
  - **Admin**
  - **Manager**
  - **Receptionist**

### 🏨 Hotel Management
- Create, edit, delete hotels *(Admin, Manager)*

### 🚪 Room Management
- Add rooms to hotels
- Set price, capacity, status *(Admin, Manager)*

### 📅 Booking System
- Date-based room booking
- Overlapping booking prevention
- Cancel bookings *(Admin, Manager, Receptionist)*

### 🧾 Audit Logs
- Automatic logging of key actions
- Admin-only access

### 📊 Dashboard
- Hotel, room, booking statistics
- Occupancy calculation
- Recent bookings overview

---

## 🧠 Tech Stack

### Backend
- **Laravel 12**
- **PHP 8.2**
- **PostgreSQL**
- Repository & Service pattern
- Policies & Middleware

### Frontend
- **Laravel Breeze (Blade)**
- Tailwind CSS
- Alpine.js

---

## 📦 Installed Libraries

| Package | Purpose |
|------|-------|
| `laravel/framework` | Core framework |
| `laravel/breeze` | Auth scaffolding |
| `laravel/sanctum` | Session auth |
| `nesbot/carbon` | Date handling |
| `laravel/tinker` | Debugging |
| `tailwindcss` | UI styling |
| `alpinejs` | Frontend interactivity |

---

## ⚙️ Requirements

- PHP **8.2+**
- Composer
- Node.js **18+**
- PostgreSQL
- Git

---

## 🚀 Installation Guide

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-org/hms.git
cd hms
```

### 2️⃣ Install Backend Dependencies
```bash
composer install
```

### 3️⃣ Environment Setup
```bash
cp .env.example .env
```

Edit `.env`:
```env
APP_NAME="Hotel Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5433
DB_DATABASE=HMS
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4️⃣ Generate App Key
```bash
php artisan key:generate
```

### 5️⃣ Install Frontend Assets
```bash
npm install
npm run build
```

For development:
```bash
npm run dev
```

### 6️⃣ Run Migrations & Seeders
⚠️ **This will reset the database**
```bash
php artisan migrate:fresh --seed
```

### 7️⃣ Start the Server
```bash
php artisan serve
```

Open:
```
http://127.0.0.1:8000
```

---

## 🔑 Default Login Credentials

| Role | Email | Password |
|----|----|----|
| Admin | admin@hms.test | password |
| Manager | manager@hms.test | password |
| Receptionist | receptionist@hms.test | password |

---

## 🔐 Authorization Rules

| Feature | Admin | Manager | Receptionist |
|------|------|--------|-------------|
| Dashboard | ✅ | ✅ | ✅ |
| Hotels | ✅ | ✅ | ❌ |
| Rooms | ✅ | ✅ | ❌ |
| Bookings | ✅ | ✅ | ✅ |
| Audit Logs | ✅ | ❌ | ❌ |

---

## 🧪 Useful Commands

Clear cache:
```bash
php artisan optimize:clear
```

View routes:
```bash
php artisan route:list
```

Check users:
```bash
php artisan tinker
User::all();
```

---

## 🧩 Project Structure (Key Parts)

```
app/
 ├── Http/
 │   ├── Controllers/
 │   ├── Middleware/
 │   └── Requests/
 ├── Policies/
 ├── Repositories/
 ├── Services/
 ├── Models/
 └── Enum/
```

---

## 📍 Project Phase

**Current Phase:**  
✅ **Phase 8 – Authorization, Audit Logging & Business Rules**

**Next Planned Phase:**  
🚧 **Phase 9 – Charts, Analytics & UI Enhancements**

---

## 👥 Team Notes

If a teammate pulls from GitHub:
1. Follow installation steps
2. Configure `.env`
3. Run migrations & seeders
4. Login using seeded credentials

---

## 📄 License

This project is for **educational and internal use**.

---

Built with ❤️ using Laravel
