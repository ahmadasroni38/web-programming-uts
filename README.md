# Kos Sederhana — Contoh Proyek UTS Pemrograman Web

Aplikasi PHP kecil (tanpa database) untuk menghitung biaya sewa kamar kos.

## Cara menjalankan

1. Pastikan PHP 8.0 atau lebih baru terpasang (`php -v`).
2. Di folder proyek, jalankan:

   ```
   php -S localhost:8000
   ```

3. Buka http://localhost:8000 di browser.

## Struktur

```
index.php          Halaman 1: daftar kamar
hitung.php         Halaman 2: form, validasi, dan hasil
includes/
  header.php       Bagian atas HTML dan navigasi
  footer.php       Bagian bawah HTML
  data.php         Data kamar dan layanan (array)
  fungsi.php       Fungsi buatan sendiri
```

## Aturan

- Diskon sewa kamar: lama sewa >= 6 bulan 5%, >= 12 bulan 10%.
- Layanan tambahan dihitung per bulan dan tidak didiskon.

## Tugas

Pelajari seluruh kode. Pada sesi UTS kamu diminta menjelaskan dan mengubah
bagian kode secara langsung.
