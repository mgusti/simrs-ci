# Docker Template: CodeIgniter 3 + Apache + PHP 7.3 + MariaDB 10.4.21

Template ini menyediakan konfigurasi dasar untuk menjalankan aplikasi CodeIgniter 3 dengan Apache dan PHP 7.3, serta database MariaDB 10.4.21.

## Struktur file

- `docker-compose.yml` - Layanan aplikasi dan database dengan port publik `8081` untuk Apache dan `3309` untuk MariaDB.
- `Dockerfile` - Image PHP 7.3 + Apache dengan ekstensi `mysqli`, `pdo_mysql`, `gd`, dan `zip`.
- `mariadb/custom.cnf` - Konfigurasi MariaDB khusus.
- `.env.example` - Contoh variabel lingkungan untuk kredensial database.

## Cara pakai

1. Salin `.env.example` menjadi `.env` dan sesuaikan jika diperlukan.

2. Letakkan kode aplikasi CodeIgniter 3 Anda di folder ini.

3. Jalankan:

```bash
docker compose up -d --build
```

4. Akses aplikasi di:

- `http://localhost:8081`

5. Koneksi database MariaDB dari host eksternal atau tool lokal:

- Host: `127.0.0.1`
- Port: `3309`
- Database: `ci3db`
- User: `ci3user`
- Password: `ci3pass`

## Import SQL ke Docker

Jika Anda ingin mengimpor file SQL langsung ke database container, jalankan dari folder project:

```bash
cd /home/gusti/simrs-ci
docker exec -i ci3-mariadb mysql -u root -prootpassword rawatinap < rawatinap.sql
```

Ganti `rawatinap` dengan nama database yang sesuai jika diperlukan.

> Jika Anda mengubah `.env`, restart layanan `db` agar variabel baru diterapkan.

## Konfigurasi MariaDB (`mariadb/custom.cnf`)

File ini digunakan untuk menambahkan konfigurasi MariaDB custom ketika container database dijalankan.

- `character-set-server = utf8mb4` - membuat default character set UTF-8 yang mendukung emoji dan karakter internasional.
- `collation-server = utf8mb4_general_ci` - set collation default.
- `sql_mode = STRICT_TRANS_TABLES,...` - mode SQL yang lebih ketat untuk menghindari data tidak konsisten.
- `innodb_file_per_table = 1` - menyimpan setiap tabel InnoDB di file sendiri.
- `innodb_buffer_pool_size = 256M` - ukuran buffer pool InnoDB untuk database kecil/menengah.
- `max_connections = 200` - jumlah koneksi maksimal.
- `skip-name-resolve = 1` - menonaktifkan DNS reverse lookup untuk koneksi.
- `explicit_defaults_for_timestamp = 1` - membuat perilaku timestamp lebih konsisten.

## Catatan tambahan

- `Dockerfile` menyalin `php.ini` custom ke container. Jika belum ada file `php.ini`, buat dengan pengaturan PHP yang Anda perlukan.
- Jika Anda tidak ingin menyimpan data database di volume Docker, hapus `db_data` dan gunakan volume lain atau mount host khusus.
