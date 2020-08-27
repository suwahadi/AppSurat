# AppSurat
Aplikasi Arsip Surat dengan Laravel v5.5. System requirementsnya bisa dilihat di: https://laravel.com/docs/5.5/#server-requirements

# Konfigurasi
Lakukan download / clone:

```bash
git clone git@github.com:suwahadi/AppSurat.git
```

Kemudian jalankan perintah berikut untuk menginstall dependency composer via command prompt / terminal.

```bash
cd AppSurat
composer install
```

# Setup Database
Copy file .env.example dengan nama .env dan sesuaikan konfigurasi database Anda. Contoh:
```php
DB_DATABASE=appsurat_db
DB_USERNAME=root
DB_PASSWORD=password
```
Kemudian jalankan perintah berikut untuk menggenerate key
```bash
php artisan key:generate
```
# Migrasi Database
Jalankan perintah berikut untuk generate tabel
```bash
php artisan migrate --seed
```
Jalankan perintah berikut untuk mulai serve / menjalankan aplikasi

```bash
php artisan serve
```
Kemudian akses ke: http://127.0.0.1:8000 via browser.

# Akses Pengguna
Untuk demo login bisa menggunakan username / password berikut:

**Akses Admin:**
> admin / 123456

**Akses User Normal:**
> user1 / 123456