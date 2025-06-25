# Website Event dan Wisata Maluku 🚀

Halo teman-teman! Selamat datang README ini akan memandu kalian langkah demi langkah untuk menyiapkan proyek ini di komputer lokal kalian (Windows), sehingga kita bisa mulai membangun hal-hal keren bersama.

Jangan khawatir jika beberapa langkah terasa baru – kita akan membahasnya dengan sangat jelas, dan kalian selalu bisa bertanya jika ada yang tidak dimengerti. Kita adalah tim!


## 📋 Persyaratan Sistem

Sebelum memulai, pastikan kalian sudah menginstal software berikut di komputer kalian. Jika belum punya, kalian perlu menginstalnya terlebih dahulu.

**Rekomendasi untuk Pengguna Windows:**
Untuk mempermudah setup PHP, MySQL, dan server web, sangat disarankan untuk menggunakan salah satu paket berikut:
*   **Laragon** (Sangat direkomendasikan untuk Laravel karena kemudahannya)
*   **XAMPP**
*   **WAMP Server**

Pastikan software di bawah ini memenuhi versi minimum:

*   **PHP:** Versi `8.1` atau lebih tinggi (Laravel 10 membutuhkan minimal PHP 8.1).
*   **MySQL:** Versi `8.0.3` atau lebih tinggi.
*   **Composer:** Sebuah "dependency manager" untuk PHP. Kalian bisa mengunduhnya dari [getcomposer.org](https://getcomposer.org/download/).
*   **Node.js & npm:** Untuk mengelola "dependency" JavaScript dan mengkompilasi aset front-end. Kalian bisa mengunduhnya dari [nodejs.org/en/download](https://nodejs.org/en/download/).
*   **Git:** Untuk "version control" (mengelola perubahan kode). Kalian bisa mengunduhnya dari [git-scm.com/downloads](https://git-scm.com/downloads).

## 🚀 Panduan Instalasi Lokal (untuk Pengguna Windows)

Ikuti langkah-langkah ini dengan cermat untuk membuat proyek berjalan di komputer kalian:

### 1. Kloning Repositori Proyek

Pertama, kalian perlu mendapatkan salinan semua file proyek.

*   Buka **Git Bash** (direkomendasikan, terinstal bersama Git) atau **Command Prompt** kalian.
*   Navigasi ke direktori tempat kalian ingin menyimpan proyek (contoh: `cd Documents/dev` atau `cd C:\Users\NamaKalian\Projects`).
*   Jalankan perintah berikut untuk mengunduh proyek:

    ```bash
    git clone https://github.com/Rettorio/UTS_FRAMEWORK_SMT6.git
    ```
    *projek akan otomatis di unduh*

*   Setelah selesai dikloning, masuk ke dalam direktori proyek:

    ```bash
    cd [NAMA_FOLDER_PROYEK]
    ```
    *(Biasanya `[NAMA_FOLDER_PROYEK]` akan sama dengan nama repositori.)*

### 2. Siapkan File Lingkungan (.env)

Laravel menggunakan file `.env` untuk menyimpan konfigurasi sensitif seperti kredensial database.

*   Salin file contoh lingkungan:
    *   **Jika menggunakan Git Bash:**
        ```bash
        cp .env.example .env
        ```
    *   **Jika menggunakan Command Prompt biasa:**
        ```cmd
        copy .env.example .env
        ```

*   Buat kunci enkripsi aplikasi (ini penting untuk keamanan):

    ```bash
    php artisan key:generate
    ```

*   **Konfigurasi Database Kalian:**
    Buka file `.env` yang baru dibuat di text editor kalian (seperti VS Code, Sublime Text, Notepad++). Kalian perlu memperbarui detail koneksi database agar sesuai dengan pengaturan lokal kalian.

    Cari baris-baris ini dan ubah:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_kalian_di_sini      # <--- PENTING: Ganti dengan nama database yang kalian inginkan!
    DB_USERNAME=user_database_kalian              # <--- PENTING: Ganti dengan username MySQL kalian (seringnya 'root')
    DB_PASSWORD=password_database_kalian          # <--- PENTING: Ganti dengan password MySQL kalian (seringnya kosong untuk 'root')
    ```
    **Catatan Penting:** Pastikan kalian sudah membuat database kosong dengan nama `nama_database_kalian_di_sini` yang kalian atur di atas, di client MySQL kalian (misalnya phpMyAdmin, MySQL Workbench, atau melalui command line). Jika kalian menggunakan Laragon/XAMPP/WAMP, pastikan Apache/Nginx dan MySQL sedang berjalan.

### 3. Instal Dependensi PHP (Composer)

Sekarang, kita akan menginstal semua paket PHP yang dibutuhkan proyek.

*   Di terminal kalian, pastikan kalian masih berada di dalam folder proyek (`[NAMA_FOLDER_PROYEK]`) dan jalankan:

    ```bash
    composer install
    ```
    Ini mungkin memakan waktu beberapa saat tergantung kecepatan internet kalian.

### 4. Instal Dependensi JavaScript (NPM)

Selanjutnya, kita akan menginstal dependensi front-end (JavaScript/CSS) dan mengkompilasinya.

*   Di terminal kalian, masih di dalam folder proyek, jalankan:

    ```bash
    npm install
    ```

*   Setelah `npm install` selesai, kompilasi aset untuk pengembangan:

    ```bash
    npm run dev
    ```
    *(Jika kalian akan melakukan deployment ke produksi nanti, mungkin akan menggunakan `npm run build` atau `npm run prod`.)*

### 5. Jalankan Migrasi dan Seeder Database

Terakhir, mari kita siapkan tabel database kalian dan mengisinya dengan data awal yang diperlukan untuk pengembangan.

*   Jalankan migrasi untuk membuat semua tabel yang diperlukan di database kalian:

    ```bash
    php artisan migrate
    ```

*   Kemudian, jalankan seeder untuk mengisi tabel tersebut dengan beberapa data user awal:

    ```bash
    php artisan db:seed --class=AdminSeeder
    php artisan db:seed --class=CustomerSeeder
    php artisan db:seed --class=PenyelenggaraSeeder
    ```
    *(Perintah-perintah ini akan menambahkan akun admin, customer, dan penyelenggara default, yang akan kalian gunakan untuk login.)*

## 🔑 Akun Pengguna Awal

Setelah menjalankan seeder, kalian akan memiliki akun pengguna berikut yang tersedia untuk login:

| Email | Password | Role |
| :------------------ | :--------- | :---------- |
| `admin1@gmail.com` | `adminadmin` | `admin` |
| `admin2@gmail.com` | `admin2` | `admin` |
| `kenny@gmail.com` | `kenny123` | `penyelenggara` |
| `putri@gmail.com` | `putri123` | `penyelenggara` |
| `adudu@gmail.com` | `adudu123` | `costumer` |
| `gobaba@gmail.com` | `gobaba123` | `costumer` |

**Catatan:** Mohon isi email dan password aktual yang digunakan di seeder kalian di sini! Ini sangat membantu agar semua orang tahu kredensial login default.

## ▶️ Menjalankan Proyek

Setelah semua langkah instalasi di atas berhasil diselesaikan, kalian dapat memulai server pengembangan Laravel.

*   Di terminal kalian, masih di dalam folder proyek, jalankan:

    ```bash
    php artisan serve
    ```

*   Kalian akan melihat pesan seperti `Laravel development server started: http://127.0.0.1:8000`.
*   Buka browser web kalian dan navigasikan ke `http://127.0.0.1:8000` (atau URL yang ditampilkan di terminal kalian) untuk melihat proyek berjalan!

## 🐛 Tips Pemecahan Masalah (Troubleshooting)

Jangan panik jika ada yang salah! Berikut adalah beberapa masalah umum dan solusinya:

*   **`composer install` atau `update` gagal?**
    *   Pastikan koneksi internet kalian stabil.
    *   Coba hapus cache Composer: `composer clear-cache` lalu `composer install` lagi.
*   **`php artisan key:generate` gagal?**
    *   Pastikan kalian sudah menyalin `.env.example` ke `.env` terlebih dahulu (`copy .env.example .env` atau `cp .env.example .env`).
*   **Masalah koneksi database (misalnya, "Access denied" atau "Unknown database")?**
    *   Periksa kembali kredensial `DB_` kalian (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di file `.env` kalian.
    *   **Penting:** Pastikan server MySQL kalian sedang berjalan (melalui Laragon/XAMPP/WAMP Control Panel).
    *   Pastikan kalian sudah membuat database kosong dengan nama persis yang kalian tentukan di `.env`.
*   **`npm install` gagal?**
    *   Coba hapus cache npm: `npm cache clean --force` lalu `npm install` lagi.
    *   Pastikan Node.js dan npm terinstal dengan benar dan sudah terupdate.
*   **"No application encryption key has been specified."**
    *   Jalankan `php artisan key:generate`.
*   **`php` atau `composer` tidak dikenal sebagai perintah?**
    *   Ini berarti PHP atau Composer belum ditambahkan ke `PATH` lingkungan sistem Windows kalian. Jika kalian menggunakan Laragon/XAMPP/WAMP, pastikan mereka dikonfigurasi dengan benar atau coba restart terminal/komputer kalian.
*   **Masih bingung atau stuck?**
    *   Jangan ragu untuk bertanya! Salin pesan error lengkapnya dan bagikan. Kita di sini untuk saling mendukung dan mencari solusinya bersama.

## 🤝 Berkontribusi

Kami sangat mendorong kontribusi! Jika kalian ingin menambahkan fitur, memperbaiki bug, atau meningkatkan sesuatu:

1.  **Tarik perubahan terbaru:** `git pull origin main` (atau `master`, tergantung nama branch utama kita)
2.  **Buat branch baru:** `git checkout -b feature/nama-fitur-kalian` (atau `bugfix/nama-bug-kalian`)
3.  **Lakukan perubahan kalian.**
4.  **Commit perubahan kalian:** `git commit -m 'Pesan deskriptif tentang perubahan kalian'`
5.  **Dorong ke branch kalian:** `git push origin feature/nama-fitur-kalian`
6.  **Buka Pull Request** di halaman repositori.

Mohon diskusikan perubahan besar atau fitur baru melalui issues terlebih dahulu.

## 📄 Lisensi

Proyek ini adalah "open-source" dan dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

## ✉️ Kontak

Jika kalian memiliki pertanyaan, saran, atau menemukan masalah, jangan ragu untuk menghubungi [Nama Kalian/Metode Kontak Pilihan, misal: "saya secara langsung," "grup chat kita," atau "buka issue di repositori ini"].

Semangat koding! Mari kita bangun sesuatu yang luar biasa bersama!

## AI GENERATED README.md with GEMINI 2.5 FLASH