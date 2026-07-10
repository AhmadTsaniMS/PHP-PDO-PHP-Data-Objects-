# PHP Database Operations with PDO (PHP Data Objects)

Repository ini berisi kumpulan latihan dasar dan implementasi mini-project untuk berinteraksi dengan database MySQL menggunakan **PDO (PHP Data Objects)**. Proyek ini mencakup penerapan *Prepared Statements*, pengelolaan *Database Transactions*, hingga pembuatan aplikasi CRUD sederhana secara aman.

---

## 🚀 Fitur & Materi Latihan

Repository ini terbagi menjadi beberapa bagian latihan operasional database:

1. **Koneksi Database Dinamis (`db.php`)** Menggunakan blok `try-catch` dengan sistem *fallback* otomatis untuk mencoba koneksi melalui `127.0.0.1` atau `localhost` dengan konfigurasi mode error handling berbasis exception.

2. **Latihan 1: Secure Data Fetching (`latihan1.php`)** Menampilkan data mahasiswa berdasarkan filter nilai minimum menggunakan *Prepared Statements* (`:min`) untuk mencegah *SQL Injection*.

3. **Latihan 2: Data Insertion (`latihan2.php`)** Melakukan operasi `INSERT` data mahasiswa baru secara aman menggunakan parameter binding pada *Prepared Statements*.

4. **Latihan 3: Database Transaction (`latihan3.php`)** Mengimplementasikan fitur transaksi data (`beginTransaction` dan `commit`) untuk melakukan pembaruan (`UPDATE`) nilai mahasiswa secara aman dan konsisten.

5. **PBL Mini-Project: Notes CRUD (`pbl_notes.php`)** Sebuah aplikasi pengelolaan catatan kecil (*Notes*) sederhana yang mengimplementasikan fungsi CRUD utuh:
   * **Create**: Menambahkan catatan baru dengan validasi input bebas *whitespace* (`trim`).
   * **Read**: Menampilkan daftar 10 catatan terbaru secara *descending* menggunakan binding integer untuk limit data.
   * **Delete**: Menghapus catatan secara dinamis berdasarkan ID melalui parameter GET.
   * **Stats**: Menampilkan statistik total catatan dan ID terakhir secara *real-time*.

---

## 🛠️ Prasyarat & Teknologi

* **PHP** (versi 7.4 atau lebih baru direkomendasikan)
* **MySQL / MariaDB**
* Ekstensi **PDO PHP** aktif

---

## 📦 Struktur Database

Proyek ini menggunakan database bernama `webworkshop` dengan dua tabel utama. Kamu bisa mengeksekusi query SQL berikut di database kamu:

### 1. Tabel `students`
```sql
CREATE TABLE students (
    nim VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(50),
    nilai INT
);

-- Data Awal untuk Latihan
INSERT INTO students (nim, nama, nilai) VALUES 
('003', 'Mahasiswa Uji', 50);
