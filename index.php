<?php
require 'includes/data.php';
require 'includes/fungsi.php';
$judul = 'Daftar Kamar';
include 'includes/header.php';
?>

<h1 class="text-2xl font-bold mb-4">Daftar Kamar</h1>

<table class="w-full bg-white border">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2 text-left">Tipe</th>
            <th class="p-2 text-left">Harga / bulan</th>
            <th class="p-2 text-left">Fasilitas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($daftarKamar as $kamar): ?>
            <tr class="border-t">
                <td class="p-2"><?= e($kamar['nama']) ?></td>
                <td class="p-2"><?= formatRupiah($kamar['harga']) ?></td>
                <td class="p-2"><?= e($kamar['fasilitas']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="mt-4">
    <a href="hitung.php" class="text-blue-600 underline">Hitung biaya sewa &rarr;</a>
</p>

<?php include 'includes/footer.php'; ?>
