# School Management System — Laravel 13

A Laravel 13 school management project with authentication, student CRUD, department management, student-name search, department filtering, and related Student/Department models.

## Requirements
- PHP 8.3+
- Composer
- MySQL/MariaDB (Laragon is supported)
- Node.js is optional; the interface uses Bootstrap CDN.

## Run locally
1. Open this folder in VS Code or a terminal.
2. Copy `.env.example` to `.env` if `.env` does not exist.
3. Configure the database in `.env`, for example:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=school_management
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. Create a MySQL database named `school_management`.
5. Run:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```
6. Visit `http://127.0.0.1:8000`, then register an account.

## Features
- Register, login, logout; student and department pages require login.
- Student create, list, edit, and delete.
- Search students by name and filter by department.
- Student belongs to one Department; Department has many Students.
- Seed sample departments and student records using `php artisan migrate --seed`.

> If the database already has tables from the earlier product project, back up anything important before using `php artisan migrate:fresh --seed`; that command drops all tables.
