<?php
require 'includes/data.php';
require 'includes/fungsi.php';
$judul = 'Hitung Biaya';

// Nilai awal (untuk sticky form) dan penampung error
$nama = '';
$hp = '';
$kamarDipilih = '';
$bulan = '';
$layananDipilih = [];
$errors = [];
$hasil = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama           = trim($_POST['nama'] ?? '');
    $hp             = trim($_POST['hp'] ?? '');
    $kamarDipilih   = $_POST['kamar'] ?? '';
    $bulan          = trim($_POST['bulan'] ?? '');
    $layananDipilih = $_POST['layanan'] ?? [];

    // Validasi sisi server, satu pesan per field
    if ($nama === '') {
        $errors['nama'] = 'Nama wajib diisi.';
    }
    if (!preg_match('/^[0-9]{9,13}$/', $hp)) {
        $errors['hp'] = 'Nomor HP harus 9-13 digit angka.';
    }
    if (!isset($daftarKamar[$kamarDipilih])) {
        $errors['kamar'] = 'Pilih tipe kamar.';
    }
    if (!ctype_digit($bulan) || (int) $bulan < 1 || (int) $bulan > 24) {
        $errors['bulan'] = 'Lama sewa harus angka 1-24 bulan.';
    }

    // Jika tidak ada error, hitung di server (harga TIDAK dikirim dari form)
    if (empty($errors)) {
        $layananPerBulan = 0;
        foreach ($layananDipilih as $kode) {
            if (isset($daftarLayanan[$kode])) {
                $layananPerBulan += $daftarLayanan[$kode]['harga'];
            }
        }
        $hasil = hitungBiaya($daftarKamar[$kamarDipilih]['harga'], (int) $bulan, $layananPerBulan);
    }
}

include 'includes/header.php';
?>

<h1 class="text-2xl font-bold mb-4">Hitung Biaya Sewa</h1>

<form method="post" action="hitung.php" class="bg-white p-4 border space-y-4">

    <div>
        <label for="nama" class="block font-semibold">Nama</label>
        <input type="text" id="nama" name="nama" value="<?= e($nama) ?>" class="border p-2 w-full">
        <?php if (isset($errors['nama'])): ?>
            <p class="text-red-600 text-sm"><?= e($errors['nama']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="hp" class="block font-semibold">Nomor HP</label>
        <input type="text" id="hp" name="hp" value="<?= e($hp) ?>" class="border p-2 w-full">
        <?php if (isset($errors['hp'])): ?>
            <p class="text-red-600 text-sm"><?= e($errors['hp']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="kamar" class="block font-semibold">Tipe Kamar</label>
        <select id="kamar" name="kamar" class="border p-2 w-full">
            <option value="">-- Pilih --</option>
            <?php foreach ($daftarKamar as $kode => $kamar): ?>
                <option value="<?= e($kode) ?>" <?= $kamarDipilih === $kode ? 'selected' : '' ?>>
                    <?= e($kamar['nama']) ?> (<?= formatRupiah($kamar['harga']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errors['kamar'])): ?>
            <p class="text-red-600 text-sm"><?= e($errors['kamar']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="bulan" class="block font-semibold">Lama Sewa (bulan)</label>
        <input type="number" id="bulan" name="bulan" value="<?= e($bulan) ?>" class="border p-2 w-full">
        <?php if (isset($errors['bulan'])): ?>
            <p class="text-red-600 text-sm"><?= e($errors['bulan']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <span class="block font-semibold">Layanan Tambahan (per bulan)</span>
        <?php foreach ($daftarLayanan as $kode => $layanan): ?>
            <label class="block">
                <input type="checkbox" name="layanan[]" value="<?= e($kode) ?>"
                    <?= in_array($kode, $layananDipilih) ? 'checked' : '' ?>>
                <?= e($layanan['nama']) ?> (<?= formatRupiah($layanan['harga']) ?>)
            </label>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2">Hitung</button>
</form>

<?php if ($hasil !== null): ?>
    <div class="bg-white p-4 border mt-6">
        <h2 class="text-xl font-bold mb-2">Rincian Biaya</h2>
        <p>Penyewa: <?= e($nama) ?> (<?= e($hp) ?>)</p>
        <p>Kamar: <?= e($daftarKamar[$kamarDipilih]['nama']) ?>, <?= (int) $bulan ?> bulan</p>
        <hr class="my-2">
        <p>Sewa kamar: <?= formatRupiah($hasil['sewa']) ?></p>
        <p>Layanan tambahan: <?= formatRupiah($hasil['layanan']) ?></p>
        <p>Diskon (<?= $hasil['persen'] ?>%): - <?= formatRupiah($hasil['diskon']) ?></p>
        <p class="font-bold text-lg mt-2">Total: <?= formatRupiah($hasil['total']) ?></p>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
