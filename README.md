# Very Basic Laravel To-Do App

A tiny Laravel app: add tasks, tick them off, delete them.

## Files

These files go into a fresh Laravel project at the same paths:

- `routes/web.php`
- `app/Models/Task.php`
- `app/Http/Controllers/TaskController.php`
- `database/migrations/2026_10_26_000000_create_tasks_table.php`
- `resources/views/tasks.blade.php`

## Setup

```bash
composer create-project laravel/laravel todo-app
cd todo-app
```

Copy the files above into the project (overwrite `routes/web.php`), then:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000

Laravel uses SQLite by default in new projects, so no database setup is needed. If asked to create the SQLite file during `migrate`, answer yes.
