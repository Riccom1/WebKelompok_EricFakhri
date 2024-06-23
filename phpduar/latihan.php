<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { margin-top: 5px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <?php
    // Inisialisasi variabel untuk konversi
    $konversi = '';
    $nilai = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari input form
        $nilai = isset($_POST['nilai']) ? intval($_POST['nilai']) : -1;

        // Proses konversi nilai
        if (!is_nan($nilai) && $nilai !== -1) {
            if ($nilai >= 80 && $nilai <= 100) {
                $konversi = 'A';
            } elseif ($nilai >= 70 && $nilai <= 79) {
                $konversi = 'B';
            } elseif ($nilai >= 60 && $nilai <= 69) {
                $konversi = 'C';
            } elseif ($nilai >= 50 && $nilai <= 59) {
                $konversi = 'D';
            } elseif ($nilai < 50 && $nilai >= 0) {
                $konversi = 'E';
            } else {
                $konversi = 'Nilai tidak valid';
            }
        } else {
            $konversi = 'Nilai tidak valid';
        }
    }
    ?>
    
    <form method="post" action="">
        <label for="nilai">Masukkan Nilai:</label>
        <input type="number" id="nilai" name="nilai" required><br><br>
        <button type="submit">Konversi</button><br><br>
        
        <label for="hasilKonversi">Hasil Konversi:</label>
        <input type="text" id="hasilKonversi" name="hasilKonversi" value="<?php echo htmlspecialchars($konversi); ?>" disabled>
    </form>

</body>
</html>
