<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { margin-top: 5px; width: 200px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <h1>Perhitungan Gaji</h1>

    <?php
    // Inisialisasi variabel untuk hasil perhitungan
    $gajiPokok = '';
    $uangLembur = '';
    $uangMakan = '';
    $totalGaji = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $jumlahHariKerja = isset($_POST['jumlahHariKerja']) ? intval($_POST['jumlahHariKerja']) : 0;
        $jumlahJamLembur = isset($_POST['jumlahJamLembur']) ? intval($_POST['jumlahJamLembur']) : 0;

        // Perhitungan gaji pokok
        $gajiPerHari = 50000;
        $gajiPokok = $gajiPerHari * $jumlahHariKerja;

        // Perhitungan uang lembur
        $uangLembur = 0;
        if ($jumlahJamLembur > 0) {
            if ($jumlahJamLembur >= 3) {
                $uangLembur = 2 * 25000 + ($jumlahJamLembur - 2) * 35000;
            } else {
                $uangLembur = $jumlahJamLembur * 25000;
            }
        }

        // Perhitungan uang makan
        $uangMakan = 0;
        if ($jumlahHariKerja >= 20) {
            $uangMakan = 5000 * $jumlahHariKerja;
        }

        // Hitung total gaji
        $totalGaji = $gajiPokok + $uangLembur + $uangMakan;

        // Format angka menjadi format mata uang Rp
        $gajiPokok = number_format($gajiPokok, 2, ',', '.');
        $uangLembur = number_format($uangLembur, 2, ',', '.');
        $uangMakan = number_format($uangMakan, 2, ',', '.');
        $totalGaji = number_format($totalGaji, 2, ',', '.');
    }
    ?>

    <form method="post" action="">
        <label for="jumlahHariKerja">Jumlah Hari Kerja:</label>
        <input type="number" id="jumlahHariKerja" name="jumlahHariKerja" required><br><br>
        
        <label for="jumlahJamLembur">Jumlah Jam Lembur:</label>
        <input type="number" id="jumlahJamLembur" name="jumlahJamLembur" required><br><br>
        
        <button type="submit">Hitung Gaji</button>
    </form>

    <form id="hasilForm">
        <label>Gaji Pokok:</label>
        <input type="text" id="gajiPokok" value="<?php echo !empty($gajiPokok) ? "Rp" . htmlspecialchars($gajiPokok) : ''; ?>" readonly><br><br>

        <label>Uang Lembur:</label>
        <input type="text" id="uangLembur" value="<?php echo !empty($uangLembur) ? "Rp" . htmlspecialchars($uangLembur) : ''; ?>" readonly><br><br>

        <label>Uang Makan:</label>
        <input type="text" id="uangMakan" value="<?php echo !empty($uangMakan) ? "Rp" . htmlspecialchars($uangMakan) : ''; ?>" readonly><br><br>

        <label>Total Gaji:</label>
        <input type="text" id="totalGaji" value="<?php echo !empty($totalGaji) ? "Rp" . htmlspecialchars($totalGaji) : ''; ?>" readonly><br><br>
    </form>
</body>
</html>
