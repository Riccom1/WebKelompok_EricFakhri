<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Pembayaran</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { margin-top: 5px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <h1>Perhitungan Pembayaran</h1>

    <?php
    // Inisialisasi variabel untuk hasil perhitungan
    $namaBarang = '';
    $hargaBarang = '';
    $jumlahBarang = '';
    $diskonBarang = '';
    $totalBayar = '';

    // Proses form saat form disubmit menggunakan metode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $namaBarang = isset($_POST['nama']) ? $_POST['nama'] : '';
        $hargaBarang = isset($_POST['harga']) ? floatval($_POST['harga']) : 0;
        $jumlahBarang = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;

        // Hitung diskon jika jumlah barang >= 3
        $diskonBarang = 0;
        if ($jumlahBarang >= 3) {
            $diskonBarang = $hargaBarang * 0.1 * $jumlahBarang;
        }

        // Hitung total bayar
        $totalBayar = ($hargaBarang * $jumlahBarang) - $diskonBarang;

        // Format angka menjadi format mata uang Rp
        $hargaBarang = number_format($hargaBarang, 2, ',', '.');
        $diskonBarang = number_format($diskonBarang, 2, ',', '.');
        $totalBayar = number_format($totalBayar, 2, ',', '.');
    }
    ?>

    <form method="post" action="">
        <label for="nama">Nama Barang:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="harga">Harga Barang (Rp):</label>
        <input type="number" id="harga" name="harga" step="0.01" required><br><br>
        
        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" required><br><br>
        
        <button type="submit">Hitung</button>
    </form>

    <form id="hasilForm">
        <label>Nama Barang:</label>
        <input type="text" id="namaBarang" value="<?php echo htmlspecialchars($namaBarang); ?>" readonly><br><br>

        <label>Harga:</label>
        <input type="text" id="hargaBarang" value="<?php echo "Rp" . htmlspecialchars($hargaBarang); ?>" readonly><br><br>

        <label>Jumlah:</label>
        <input type="text" id="jumlahBarang" value="<?php echo htmlspecialchars($jumlahBarang); ?>" readonly><br><br>

        <label>Diskon:</label>
        <input type="text" id="diskonBarang" value="<?php echo "Rp" . htmlspecialchars($diskonBarang); ?>" readonly><br><br>

        <label>Total Bayar:</label>
        <input type="text" id="totalBayar" value="<?php echo "Rp" . htmlspecialchars($totalBayar); ?>" readonly><br><br>
    </form>
</body>
</html>
