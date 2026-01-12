# Laravel Backend API with XAMPP MySQL

## Project Overview

This is a **Laravel 10 backend API** for managing tasks and projects. It provides features such as:

-   CRUD operations for tasks and projects
-   Task filtering by status and project
-   Pagination support
-   API responses in JSON format
-   Error handling with logging

## Tech Stack

-   **Backend Framework:** Laravel 10
-   **Database:** MySQL (XAMPP)
-   **Routing:** Laravel API Routes
-   **HTTP Client:** Axios (frontend integration)
-   **Authentication:** Optional (Laravel Sanctum / JWT)

## Project Structure

```
app/
├─ Http/
│  ├─ Controllers/
│  │  ├─ TaskController.php
│  │  └─ ProjectController.php
│  └─ Requests/  # Optional: Form Request validations
├─ Models/
│  ├─ Task.php
│  └─ Project.php
routes/
├─ api.php          # API routes
├─ web.php          # Web routes (optional)
database/
├─ migrations/     # Task and Project table migrations
├─ seeders/         # Optional database seeders
public/
├─ database.sql     # SQL file Take it and create database in your system and import it
```

## Prerequisites

-   PHP 8.1+
-   Composer 2+
-   Node.js (for frontend, optional)
-   XAMPP (MySQL)
-   Git (optional)

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/navdeeppathan/laravel_assignment_backend_laravel.git
cd laravel-backend
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Configure Database

Edit & Place the `.env` file:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_assignment
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Create the Database

1. Open **phpMyAdmin** at `http://localhost/phpmyadmin/`
2. Click **New**, enter database name `laravel_assignment`, click **Create**

### 4. Import SQL File

Your SQL file is in `public/database.sql`

**Option A: Using phpMyAdmin**

1. Go to your database in phpMyAdmin
2. Click **Import**
3. Choose the SQL file (`public/database.sql`)
4. Click **Go**

**Option B: Using Command Line**

```bash
cd C:\xampp\mysql\bin
mysql -u root -p your_database_name < C:\xampp\htdocs\your_project\public\database.sql
```

### 5. Run Migrations (Optional)

If you want to run Laravel migrations on a fresh database:

```bash
php artisan migrate
```

> **Note:** Skip if your SQL file already contains all tables.

### Seed Demo Data

The project contains a database seeder that automatically creates:

3 Projects

Each project has 3 Tasks

Run:

```bash
php artisan db:seed
```

Or reset and seed again:

```bash
php artisan migrate:fresh --seed
```

### 6. Run Development Server

```bash
php artisan serve
```

-   The backend will run at `http://127.0.0.1:8000`

## API Endpoints

**Base URL:** `http://127.0.0.1:8000/api`

### Tasks

-   `GET /tasks` → List tasks (supports filters: `status`, `project_id`, `search`, pagination)
-   `GET /tasks/{id}` → Get single task
-   `POST /tasks` → Create task
-   `PUT /tasks/{id}` → Update task
-   `DELETE /tasks/{id}` → Delete task
-   `PATCH /tasks/status` → Update task status

### Projects

-   `GET /projects` → List projects (with task count)
-   `POST /projects` → Create project

## Features

### Task Management

-   Create, read, update, delete tasks
-   Update task status separately
-   Filter by project or status
-   Search tasks by title
-   Pagination support

### Project Management

-   Create and list projects
-   View task count per project

## Error Handling

-   Validation errors return JSON with error messages
-   Exceptions are logged in `storage/logs/laravel.log`
-   API returns proper HTTP status codes for su
