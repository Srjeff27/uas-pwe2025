# 📱 Sistem Manajemen Toko Smartphone
**Proyek UAS Pemrograman Web Enterprise 2025**  
Dibangun dengan Laravel 12 untuk mengelola operasional toko smartphone secara modern dan efisien.

🌐 **Live URL:** Belum tersedia — Jalankan secara lokal.

---

## 🚀 Fitur Aplikasi

- 🔐 **Autentikasi Laravel Breeze**
- 📦 CRUD Produk Smartphone
- 🛒 Input & Kelola Transaksi Penjualan
- 📊 Laporan Penjualan Bulanan
- 👥 Role Management: Admin & Kasir
- 🧾 Validasi Form Otomatis
- 💻 Responsive UI dengan Bootstrap 5

---

## 🧪 Laravel 12 Highlight

- ⚡ Built-in Vite untuk front-end build system
- 🛡️ Laravel Pennant untuk feature flags *(jika digunakan)*
- 🔄 Route Groups lebih fleksibel
- 🧵 Laravel Reverb (jika diaktifkan) untuk real-time broadcasting
- 📦 Native support PHP 8.2+

---

## 🛠️ Cara Instalasi Lokal

1. **Clone repositori**
   ```bash
   git clone https://github.com/Srjeff27/Sistem-Manajemen-Toko-Smartphone-uas-pwe2025.git
   cd Sistem-Manajemen-Toko-Smartphone-uas-pwe2025
   
2. **Install dependency**
   composer install
   npm install
   
3. **Setup file environment**
   cp .env.example .env
   php artisan key:generate

4. **Konfigurasi database**

    Buat database MySQL/MariaDB

    Update .env dengan kredensial database

    Jalankan migrasi:
    php artisan migrate
5. **Jalankan aplikasi**
   php artisan serve
   npm run dev


🗂️ Struktur Folder Penting

├── app/           → Logic bisnis (Models, Controllers)
├── routes/        → Routing Laravel (web.php, api.php)
├── resources/     → Blade Views + Assets
├── database/      → Migration & Seeder
├── public/        → Entry point aplikasi
├── tests/         → PHPUnit & Feature Tests


👤 Pengembang
Jefri Hamid Jaya (Sr. Jeff)
Mahasiswa Sistem Informasi, Universitas Bengkulu
📧 jefrihamidjaya77@gmail.com
🌐 GitHub | LinkedIn

⚠️ Catatan
Proyek ini merupakan tugas akhir untuk mata kuliah Pemrograman Web Enterprise (PWE) dan bukan untuk produksi komersial. Namun sangat cocok dijadikan dasar sistem manajemen toko skala kecil.

📃 Lisensi
MIT License – Bebas digunakan dan dimodifikasi untuk keperluan pembelajaran dan pengembangan pribadi.


