# Pawonku Web – Food Menu PHP

Sistem katalog makanan dan dashboard admin berbasis PHP dan MySQL.  
User dapat melihat daftar menu, dan admin dapat mengelola produk (CRUD).

---

## Cara Setup

### 1. Buat database
Buat database MySQL dengan nama:

```
pawonku
```

Atau gunakan nama lain dan sesuaikan di `config.php`.

---

### 2. Import database
Import file:

```
pawonku.sql
```

ke dalam database tersebut menggunakan phpMyAdmin.

---

### 3. Letakkan project di XAMPP
Copy folder project ke:

```
C:\xampp\htdocs\pawonku_web
```

---

### 4. Atur koneksi database
Buka file:

```
config.php
```

Sesuaikan pengaturan berikut:

```php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'pawonku');
define('DB_USER', 'root');
define('DB_PASS', '');
```

---

### 5. Jalankan aplikasi

Halaman User:
```
http://localhost/pawonku_web/public/index.php
```

Dashboard Admin:
```
http://localhost/pawonku_web/admin/login.php
```

Login admin (default):
```
Username: admin
Password: admin123
```

---

## Informasi Tambahan
- Folder `uploads/` digunakan untuk menyimpan gambar produk.
- Dashboard admin mendukung CRUD (tambah, edit, hapus produk).
- Pastikan folder `uploads/` dapat ditulis (writeable).
- File CSS utama berada di `assets/style.css`.

---
