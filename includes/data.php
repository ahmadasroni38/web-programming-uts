<?php
// Data tetap disimpan dalam array multidimensi (tanpa database)
$daftarKamar = [
    'standar' => ['nama' => 'Standar', 'harga' => 800000,  'fasilitas' => 'Kasur, lemari, kipas angin'],
    'ac'      => ['nama' => 'AC',      'harga' => 1200000, 'fasilitas' => 'Kasur, lemari, AC'],
    'deluxe'  => ['nama' => 'Deluxe',  'harga' => 1600000, 'fasilitas' => 'Kasur, lemari, AC, kamar mandi dalam'],
    'vip'     => ['nama' => 'VIP',     'harga' => 2200000, 'fasilitas' => 'Kasur, lemari, AC, kamar mandi dalam, TV'],
];

// Harga layanan tambahan per bulan
$daftarLayanan = [
    'laundry' => ['nama' => 'Laundry',    'harga' => 150000],
    'parkir'  => ['nama' => 'Parkir',     'harga' => 50000],
    'wifi'    => ['nama' => 'WiFi Cepat', 'harga' => 100000],
];
