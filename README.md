# 📸 KameraKu - Website Penyewaan Kamera

**KameraKu** adalah aplikasi berbasis web yang dibangun menggunakan **Laravel 6** untuk membantu pengelolaan bisnis penyewaan kamera. Aplikasi ini menangani manajemen stok barang, pendataan penyewa, transaksi peminjaman, hingga pengembalian unit.

## 🚀 Fitur Unggulan

- **Dashboard Admin:** Ringkasan statistik (Total Pesanan, Unit Tersewa, Total Stok, dll).
- **Manajemen Stok (CRUD):** Tampilkan, Tambah, Edit, Hapus data kamera beserta upload foto produk.
- **Sistem Booking:**
  - Form pemesanan dengan perhitungan durasi otomatis.
  - Kalkulasi total harga berdasarkan durasi sewa.
  - Cek ketersediaan stok otomatis (stok berkurang saat dibooking).
- **Status Pesanan:** Pelacakan status (Pending, Disewa, Selesai).
- **Manajemen User:** Pengelolaan akun admin dan petugas.
- **Laporan/Invoice:** Lihat detail pesanan (Resi).

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 6
- **Frontend:** Bootstrap 4
- **Icons:** Bootstrap Icons / FontAwesome

## 📂 Struktur Database

Aplikasi ini menggunakan beberapa tabel utama:

- `users`: Data login admin/petugas.
- `kamera`: Data produk (Nama, Brand, Harga, Stok, Gambar).
- `penyewa`: Data pelanggan (Nama, KTP, Alamat, No HP).
- `bookings`: Header transaksi (Tanggal sewa, Total harga, Status).
- `booking_details`: Detail barang yang disewa dalam satu transaksi.

Dibuat oleh Natanael - 71220928
