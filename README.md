# SID Protomulyo - Laravel 11

Sistem Informasi Desa Protomulyo versi Laravel.

## Stack
- **Framework**: Laravel 11
- **Database**: MySQL (Eloquent ORM)
- **Frontend**: Bootstrap 5.3, Chart.js, SweetAlert2

## Instalasi

```bash
# 1. Install dependencies
composer install

# 2. Copy & edit env
cp .env.example .env
php artisan key:generate

# Edit .env sesuaikan database:
# DB_DATABASE=sid_protomulyo
# DB_USERNAME=root
# DB_PASSWORD=

# 3. Buat database
# CREATE DATABASE sid_protomulyo;

# 4. Jalankan migrasi (otomatis buat tabel + admin)
php artisan migrate

# 5. Storage link
php artisan storage:link

# 6. Jalankan server
php artisan serve
```

## Login Admin
- URL: http://localhost:8000/admin/login
- Username: admin
- Password: admin123

## Struktur
```
app/Http/Controllers/   -> Semua controller
app/Http/Middleware/    -> AdminMiddleware
app/Models/             -> 7 Eloquent models
database/migrations/    -> 3 file migrasi
resources/views/        -> Blade templates
routes/web.php          -> Semua routing
```
