# Website Pendaftaran Seminar

## Pembuat
- **NAMA   : ALDI TULUS P**
- **NIM    : 2200018097**
- **KELAS  : C**

## Deskripsi
Website Pendaftaran Seminar ini adalah sebuah aplikasi berbasis web yang digunakan untuk melakukan pendaftaran seminar secara online. Website ini dibuat sebagai tugas kuliah pada mata kuliah **Pemrograman Website Dinamis**.

Pengguna dapat melakukan pendaftaran seminar, mengisi data diri, dan menerima konfirmasi pendaftaran secara otomatis melalui sistem yang dibangun pada website ini.

## Penggunaan
- **Pendaftaran Seminar**: Pengguna dapat mengisi form pendaftaran dengan memasukkan nama, email, dan data diri lainnya.
- **Admin Panel**: Admin dapat melihat data pendaftar dan mengelola pendaftaran yang sudah masuk.
- **Login**: Untuk login Admin cek terlebih dahulu table 'tb_user' pada database, atau menggunakan username : admin dan password admin1

## Fitur
- Formulir pendaftaran seminar dengan validasi input.
- Halaman konfirmasi setelah pendaftaran berhasil.
- Manajemen data pendaftar yang dapat diakses oleh admin.

## Teknologi yang Digunakan
- **Frontend**:
  - HTML
  - CSS
  - JavaScript
  
- **Backend**:
  - PHP 
  - MySQL

- **Library dan Framework**:
  - Bootstrap
  
## Instalasi

### Persyaratan Sistem
- Web server - phpMyAdmin
- PHP (versi 7.4 atau lebih tinggi)
- MySQL
- Text editor

### Langkah-langkah Instalasi
1. **Clone repository**:
    ```bash
    git clone https://github.com/littleboy12/pendaftaranSeminar.git
    ```

2. **Pindahkan file ke direktori root server**:
   - Pindahkan folder project ke dalam folder `htdocs` (untuk XAMPP) atau folder root server lainnya.

3. **Buat database di MySQL**:
   - Masuk ke phpMyAdmin atau menggunakan command line untuk membuat database:
     ```sql
     CREATE DATABASE db_seminar;
     ```

4. **Impor file database**:
   - Gunakan file SQL yang ada di folder `db` untuk mengimpor tabel-tabel yang diperlukan ke dalam database `db_seminar`.

5. **Konfigurasi koneksi database**:
   - Edit file `config.php` dan sesuaikan dengan detail koneksi database (host, username, password, dan nama database).

6. **Akses aplikasi**:
   - Buka browser dan akses URL berikut:
     ```
     http://localhost/nama-folder/
     ```
## Kontribusi
Jika Anda ingin berkontribusi pada project ini, Anda dapat mengikuti langkah-langkah berikut:
1. Fork repository ini.
2. Buat branch baru (`git checkout -b fitur-baru`).
3. Lakukan perubahan dan commit (`git commit -am 'Menambahkan fitur baru'`).
4. Push branch ke repository Anda (`git push origin fitur-baru`).
5. Buat pull request untuk review.
