# Setup Admin untuk E-Kelurahan

## Data Admin yang Tersedia

Setelah menjalankan seeder atau SQL script, akan ada 2 akun admin:

### 1. Administrator
- **Username**: `admin`
- **Password**: `password`
- **Email**: admin@kelurahan.com
- **Role**: admin

### 2. Petugas Kelurahan
- **Username**: `petugas`
- **Password**: `password`
- **Email**: petugas@kelurahan.com
- **Role**: petugas

## Cara 1: Menggunakan Laravel Seeder (Recommended)

Jalankan perintah berikut di terminal/command prompt dari folder `kelurahan`:

```bash
php artisan db:seed
```

Atau jika ingin menjalankan seeder admin saja:

```bash
php artisan db:seed --class=AdminSeeder
```

## Cara 2: Menggunakan SQL Script (Langsung ke MySQL)

### Melalui phpMyAdmin:
1. Buka phpMyAdmin di browser: `http://localhost/phpmyadmin`
2. Pilih database `kelurahan_db` (atau sesuai nama database Anda)
3. Klik tab "SQL"
4. Copy isi file `database/insert_admin.sql`
5. Paste ke text area dan klik "Go"

### Melalui MySQL Command Line:
```bash
mysql -u root -p kelurahan_db < database/insert_admin.sql
```

### Melalui Command Prompt (Windows):
```bash
cd C:\xampp\mysql\bin
mysql -u root -p
```
Kemudian:
```sql
USE kelurahan_db;
source C:/xampp/htdocs/project-kka-iniromann/kelurahan/database/insert_admin.sql
```

## Login Admin

Setelah data admin berhasil ditambahkan, Anda dapat login ke halaman admin dengan:

1. Buka: `http://localhost/project-kka-iniromann/kelurahan/public/admin/login`
2. Masukkan username dan password sesuai data di atas

## Catatan

- Pastikan database sudah dibuat dan migrasi sudah dijalankan (`php artisan migrate`)
- Jika terjadi error "duplicate entry", berarti data admin sudah ada di database
- Untuk reset database dan seeder ulang, gunakan: `php artisan migrate:fresh --seed`
- Password sudah di-hash menggunakan bcrypt untuk keamanan
