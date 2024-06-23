<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Biaya Pemakaian</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { margin-top: 5px; width: 200px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <h2>Tagihan</h2>
    <form method="post" action="">
        <label for="secondsInput">Jumlah Detik Pemakaian:</label>
        <input type="number" id="secondsInput" name="secondsInput" placeholder="Masukkan jumlah detik pemakaian" required><br><br>
        
        <button type="submit">Hitung Biaya</button><br><br>
    </form>

    <?php
    // Proses PHP untuk menghitung biaya dan waktu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $secondsInput = intval($_POST['secondsInput']);

        // Tarif per detik
        $pulsa = 30 / 45;

        // Hitung total biaya
        $biaya = $secondsInput * $pulsa;

        // Hitung jam, menit, dan detik
        $jam = floor($secondsInput / 3600);
        $sisaDetikSetelahJam = $secondsInput % 3600;
        $menit = floor($sisaDetikSetelahJam / 60);
        $sisaDetikSetelahMenit = $sisaDetikSetelahJam % 60;

        // Tampilkan hasil
        echo "<div class='result'><strong>Total Biaya:</strong> Rp " . number_format($biaya, 2, ',', '.') . "</div>";
        echo "<div class='result'><strong>Jam:</strong> " . $jam . " jam</div>";
        echo "<div class='result'><strong>Menit:</strong> " . $menit . " menit</div>";
        echo "<div class='result'><strong>Detik:</strong> " . $sisaDetikSetelahMenit . " detik</div>";
    }
    ?>
</body>
</html>
