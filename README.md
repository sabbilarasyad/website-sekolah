# Website Sekolah — Domain A: Foundation & Authentication

Repo ini adalah fondasi (Domain A) dari project Website Sekolah (Laravel).
Domain B/C/D/E membangun fitur mereka di atas struktur ini.

## ⚠️ Catatan penting soal setup di lingkungan pengembangan Sabil

Kode di branch `feature/auth` ini ditulis **tangan, mengikuti struktur resmi
Laravel 11**, karena sandbox tempat kode ini dibuat **tidak punya akses ke
packagist.org / getcomposer.org** (hanya domain tertentu yang di-whitelist),
sehingga `composer create-project laravel/laravel .` dan `composer install`
**tidak bisa dijalankan di sini**. Belum ada folder `vendor/`, `artisan`
executable, atau `composer.lock`.

Yang sudah dikerjakan: seluruh source code aplikasi (models, controllers,
middleware, routes, views, config) sesuai struktur folder Laravel 11 standar.
Yang perlu Sabil jalankan di mesin lokal (yang punya akses internet penuh):

```bash
# 1. Masuk ke folder project ini, lalu install dependency Laravel
composer install

# 2. Generate artisan (composer install akan membuat vendor/, artisan sudah ada di repo)
cp .env.example .env
php artisan key:generate

# 3. Sesuaikan kredensial DB di .env (DB_DATABASE=sekolah, dll)

# 4. Buat tabel session (dipakai SESSION_DRIVER=database) & cache/queue table
php artisan session:table
php artisan queue:table
php artisan migrate   # HANYA akan membuat tabel sessions/cache/jobs baru,
                       # TIDAK menyentuh tabel guru/mapel/murid/nilai/ortu/users
                       # yang sudah ada — tidak ada migration untuk tabel itu.

# 5. Jalankan
php artisan serve
```

Jika `php artisan key:generate` tidak tersedia karena `artisan` belum
ter-generate oleh composer, jalankan dulu:
```bash
composer create-project laravel/laravel tmp-laravel "^11.9"
```
lalu salin file `artisan`, `bootstrap/providers.php` (jika ada), dan
`public/index.php` bawaan Laravel 11 ke root project ini (semua sudah
disesuaikan lewat `bootstrap/app.php` di repo ini, jadi cukup file
bootstrap eksekusi standarnya saja yang perlu disalin).

## Struktur yang dibangun di Domain A

- `app/Models/User.php` — model auth utama, relasi ke guru/murid/ortu, password `hidden`.
- `app/Models/{Guru,Murid,Ortu,Mapel,Nilai,DataSiswaOrtu}.php` — model **baca-saja**
  untuk verifikasi koneksi DB & dipakai domain lain sebagai basis relasi.
- `app/Http/Controllers/Auth/LoginController.php` — login/logout, rate limiting,
  pesan error generik (tidak bocorkan user ada/tidak).
- `app/Http/Controllers/DashboardController.php` — routing dashboard per role.
- `app/Http/Middleware/RoleMiddleware.php` — alias `role:admin,guru,...`.
- `resources/views/layouts/app.blade.php` — shared layout + navbar, dipakai semua domain.
- `resources/views/dashboard/{admin,guru,siswa,ortu}.blade.php` — placeholder,
  silakan ditambahkan konten oleh domain terkait tanpa mengubah layout.

## Integrasi untuk Domain B/C/D/E

Lihat bagian "Integration notes" di laporan akhir (chat) untuk detail
route group, middleware, dan model yang tersedia untuk dipakai.
