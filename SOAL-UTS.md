# Soal Lisan UTS — Pemrograman Web

> **Mata Kuliah:** Pemrograman Web · **Cakupan:** Pertemuan 1–5
> **Bentuk:** ujian lisan sambil membuka kode · **Jumlah:** 10 soal · **Skor:** 10 poin per soal (total 100)

## Petunjuk

1. Pelajari seluruh kode di repo ini sebelum ujian. Jalankan dengan:

   ```
   php -S localhost:8000
   ```

   lalu buka http://localhost:8000.
2. Saat ujian, buka repo di editor dan browser kamu sendiri.
3. Dosen membacakan soal. Kamu **menunjuk bagian kode yang dimaksud**, menjelaskan dengan kata-katamu sendiri, lalu mengerjakan **Praktik** langsung di kode.
4. Boleh membuka catatan, bahan ajar, dan PHP Manual. Kode yang tidak dapat kamu jelaskan tidak mendapat nilai.

## Penskoran per soal

| Poin | Kriteria |
|---|---|
| 0–4 | Penjelasan benar dan menunjuk kode yang tepat |
| 0–4 | Praktik (mengubah atau menelusuri kode) berhasil |
| 0–2 | Dijelaskan dengan kata-kata sendiri, bukan sekadar membaca kode |

---

## Soal 1 — Cara Kerja Web (Pertemuan 1)

Jika `index.php` dibuka dengan klik dua kali dari File Explorer, hasilnya berbeda dengan dibuka lewat `localhost:8000`. Jelaskan mengapa. Siapa yang menjalankan kode PHP, browser atau server?

**Praktik:** Tunjukkan *View Page Source* di browser dan jelaskan mengapa kode PHP tidak terlihat di sana.

## Soal 2 — Struktur HTML dan Form (Pertemuan 1)

Pada [hitung.php](hitung.php), pilih satu pasangan `<label>` dan `<input>`. Apa fungsi atribut `for` dan `id`? Apa beda atribut `id` dengan `name`?

**Praktik:** Ubah salah satu atribut `name` pada form, lalu jelaskan apa yang terjadi saat form dikirim.

## Soal 3 — Variabel dan Tipe Data (Pertemuan 2)

Pada [hitung.php](hitung.php), data lama sewa dari form bertipe apa di PHP? Mengapa ada `(int)` sebelum nilainya dipakai menghitung? Apa beda `==` dan `===`?

**Praktik:** Tampilkan tipe data variabel `$bulan` dengan `var_dump()` dan jelaskan hasilnya.

## Soal 4 — Percabangan (Pertemuan 2)

Jelaskan cara kerja fungsi `hitungDiskonPersen()` di [includes/fungsi.php](includes/fungsi.php). Mengapa urutan kondisinya seperti itu? Apa fungsi `default`?

**Praktik:** Tambahkan satu aturan diskon baru, lalu tulis ulang fungsi yang sama memakai `if / elseif / else`.

## Soal 5 — Array dan Perulangan (Pertemuan 3)

Jelaskan struktur `$daftarKamar` di [includes/data.php](includes/data.php). Pada `foreach ($daftarKamar as $kode => $kamar)`, apa isi `$kode` dan `$kamar`?

**Praktik:** Tambahkan satu tipe kamar baru. Sebutkan berkas apa saja yang perlu diubah agar kamar itu muncul di tabel dan di dropdown.

## Soal 6 — Fungsi Buatan Sendiri (Pertemuan 3)

Pilih fungsi `hitungBiaya()`. Sebutkan parameter, tipe data, dan *return type*-nya. Mengapa hasilnya dikembalikan lewat `return`, tidak langsung ditampilkan dengan `echo` di dalam fungsi?

**Praktik:** Ubah aturan perhitungan sesuai permintaan dosen, lalu hitung manual hasilnya dan cocokkan dengan tampilan di browser.

## Soal 7 — include dan require (Pertemuan 3)

Apa beda `include` dan `require`? Mengapa `header.php` dan `footer.php` dipisah dari halaman? Dari mana nilai `<title>` pada halaman berasal?

**Praktik:** Ubah nama salah satu berkas di folder `includes/`, muat ulang halaman, dan jelaskan pesan error yang muncul.

## Soal 8 — GET dan POST (Pertemuan 4)

Mengapa form memakai `method="post"`? Apa fungsi `$_SERVER['REQUEST_METHOD'] === 'POST'`? Mengapa harga kamar tidak dikirim lewat form, misalnya dengan `<input type="hidden">`?

**Praktik:** Ubah metode form menjadi `get`, kirim form, dan jelaskan perubahan yang terlihat serta alasannya.

## Soal 9 — Validasi, Sticky Form, dan XSS (Pertemuan 4)

Di mana validasi untuk field Lama Sewa? Bagaimana form tetap menampilkan isian setelah terjadi error? Mengapa nilai yang ditampilkan dibungkus fungsi `e()`?

**Praktik:** Lepas `e()` dari satu field, kirim isian berisi tag HTML, dan jelaskan apa yang terjadi. Kembalikan seperti semula.

## Soal 10 — Menelusuri dan Memperbaiki Kode (Pertemuan 5)

Hitung **secara manual** (tanpa menjalankan program) biaya sewa dengan data yang disebutkan dosen. Lalu cocokkan dengan hasil di browser.

**Praktik:** Dosen menyisipkan satu kesalahan pada kode. Temukan dan perbaiki dengan strategi debugging: baca pesan error, periksa nilai variabel, dan telusuri langkah demi langkah.

---

## Yang perlu kamu siapkan

- [ ] Aplikasi berjalan di laptopmu (`php -S localhost:8000`).
- [ ] Mampu menjelaskan alur data dari form sampai hasil: `hitung.php` → validasi → `hitungBiaya()` → tampilan.
- [ ] Mampu mengubah kode kecil secara langsung (aturan diskon, data kamar, nama field).
- [ ] Mampu menghitung satu contoh biaya sewa secara manual.
