<?php
// Mengubah angka menjadi format rupiah, contoh: 1200000 -> Rp 1.200.000
function formatRupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Aturan diskon bertingkat berdasarkan lama sewa (hasil dalam persen)
function hitungDiskonPersen(int $bulan): int
{
    return match (true) {
        $bulan >= 12 => 10,
        $bulan >= 6  => 5,
        default      => 0,
    };
}

// Menghitung seluruh komponen biaya, hasilnya berupa array
function hitungBiaya(int $hargaKamar, int $bulan, int $layananPerBulan): array
{
    $sewa     = $hargaKamar * $bulan;
    $layanan  = $layananPerBulan * $bulan;
    $persen   = hitungDiskonPersen($bulan);
    $diskon   = intdiv($sewa * $persen, 100); // diskon hanya untuk sewa kamar
    $total    = $sewa + $layanan - $diskon;

    return [
        'sewa'    => $sewa,
        'layanan' => $layanan,
        'persen'  => $persen,
        'diskon'  => $diskon,
        'total'   => $total,
    ];
}

// Mengamankan teks sebelum ditampilkan ke HTML (mencegah XSS)
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}
