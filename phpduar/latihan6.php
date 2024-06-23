<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Zodiak</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { margin-top: 5px; width: 200px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <h1>Game Zodiak</h1>
    <form method="post" action="">
        <label for="tanggal">Tanggal Lahir:</label>
        <input type="number" id="tanggal" name="tanggal" required><br><br>
        
        <label for="bulan">Bulan Lahir:</label>
        <input type="number" id="bulan" name="bulan" required><br><br>
        
        <button type="submit">Cek Zodiak</button><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tanggal = intval($_POST['tanggal']);
        $bulan = intval($_POST['bulan']);

        $zodiak = '';
        $kesehatan = '';
        $asmara = '';
        $keuangan = '';
        $karier = '';

        if (($tanggal >= 21 && $tanggal <= 31 && $bulan == 3) || ($tanggal >= 1 && $tanggal <= 19 && $bulan == 4)) {
            $zodiak = 'Aries';
        } elseif (($tanggal >= 20 && $tanggal <= 30 && $bulan == 4) || ($tanggal >= 1 && $tanggal <= 20 && $bulan == 5)) {
            $zodiak = 'Taurus';
        } elseif (($tanggal >= 21 && $tanggal <= 31 && $bulan == 5) || ($tanggal >= 1 && $tanggal <= 20 && $bulan == 6)) {
            $zodiak = 'Gemini';
        } elseif (($tanggal >= 21 && $tanggal <= 30 && $bulan == 6) || ($tanggal >= 1 && $tanggal <= 22 && $bulan == 7)) {
            $zodiak = 'Cancer';
        } elseif (($tanggal >= 23 && $tanggal <= 31 && $bulan == 7) || ($tanggal >= 1 && $tanggal <= 22 && $bulan == 8)) {
            $zodiak = 'Leo';
        } elseif (($tanggal >= 23 && $tanggal <= 31 && $bulan == 8) || ($tanggal >= 1 && $tanggal <= 22 && $bulan == 9)) {
            $zodiak = 'Virgo';
        } elseif (($tanggal >= 23 && $tanggal <= 30 && $bulan == 9) || ($tanggal >= 1 && $tanggal <= 22 && $bulan == 10)) {
            $zodiak = 'Libra';
        } elseif (($tanggal >= 23 && $tanggal <= 31 && $bulan == 10) || ($tanggal >= 1 && $tanggal <= 21 && $bulan == 11)) {
            $zodiak = 'Scorpio';
        } elseif (($tanggal >= 22 && $tanggal <= 30 && $bulan == 11) || ($tanggal >= 1 && $tanggal <= 21 && $bulan == 12)) {
            $zodiak = 'Sagittarius';
        } elseif (($tanggal >= 22 && $tanggal <= 31 && $bulan == 12) || ($tanggal >= 1 && $tanggal <= 19 && $bulan == 1)) {
            $zodiak = 'Capricorn';
        } elseif (($tanggal >= 20 && $tanggal <= 31 && $bulan == 1) || ($tanggal >= 1 && $tanggal <= 18 && $bulan == 2)) {
            $zodiak = 'Aquarius';
        } elseif (($tanggal >= 19 && $tanggal <= 28 && $bulan == 2) || ($tanggal >= 1 && $tanggal <= 20 && $bulan == 3)) {
            $zodiak = 'Pisces';
        } else {
            $zodiak = 'Tanggal atau bulan tidak valid';
        }

        switch ($zodiak) {
            case 'Aries':
                $kesehatan = "'Anda dalam kondisi prima, tetap jaga kesehatan Anda.";
                $asmara = "Hubungan asmara Anda sedang hangat-hangatnya.";
                $keuangan = "Keuangan Anda stabil, namun tetap harus bijak dalam mengatur pengeluaran.";
                $karier = "Karier Anda sedang menanjak, teruslah bekerja keras.";
                break;
            case 'Taurus':
                $kesehatan = 'Jaga pola makan Anda agar tetap sehat.';
                $asmara = 'Ada sedikit masalah dalam hubungan asmara, bicarakan baik-baik dengan pasangan.';
                $keuangan = 'Keuangan Anda cukup baik, pertimbangkan investasi kecil.';
                $karier = 'Ada peluang baru di karier, jangan ragu untuk mengambilnya.';
                break;
            case 'Gemini':
                $kesehatan = 'Luangkan waktu untuk istirahat yang cukup.';
                $asmara = 'Hari ini adalah waktu yang tepat untuk kencan romantis.';
                $keuangan = 'Keuangan Anda sedikit menurun, hindari pengeluaran tidak perlu.';
                $karier = 'Tetap fokus pada tujuan karier Anda, jangan mudah terpengaruh.';
                break;
            case 'Cancer':
                $kesehatan = 'Perhatikan kesehatan mental Anda, lakukan hal-hal yang menyenangkan.';
                $asmara = 'Hubungan dengan keluarga semakin harmonis.';
                $keuangan = 'Keuangan Anda stabil, bisa menabung lebih banyak.';
                $karier = 'Pekerjaan sedang banyak, atur waktu dengan baik.';
                break;
            case 'Leo':
                $kesehatan = 'Tetap aktif berolahraga untuk menjaga kesehatan.';
                $asmara = 'Asmara sedang dalam masa sulit, bersabar dan berpikiran terbuka.';
                $keuangan = 'Keuangan sedikit menurun, hindari pembelian impulsif.';
                $karier = 'Karier Anda berjalan baik, ada kemungkinan kenaikan jabatan.';
                break;
            case 'Virgo':
                $kesehatan = 'Kesehatan fisik dan mental perlu diperhatikan.';
                $asmara = 'Hubungan asmara Anda sedang dalam masa tenang.';
                $keuangan = 'Keuangan Anda cukup stabil, tidak ada masalah besar.';
                $karier = 'Karier Anda berjalan lancar, ada peluang untuk proyek baru.';
                break;
            case 'Libra':
                $kesehatan = 'Jaga keseimbangan antara pekerjaan dan istirahat.';
                $asmara = 'Asmara Anda harmonis, penuh dengan kebahagiaan.';
                $keuangan = 'Keuangan Anda stabil, bisa merencanakan liburan kecil.';
                $karier = 'Karier Anda sedang berkembang, ada peluang untuk naik jabatan.';
                break;
            case 'Scorpio':
                $kesehatan = 'Jaga kesehatan dengan menghindari makanan cepat saji.';
                $asmara = 'Asmara Anda penuh gairah, hubungan semakin erat.';
                $keuangan = 'Keuangan Anda cukup baik, bisa menabung lebih banyak.';
                $karier = 'Karier Anda menantang, ada peluang besar menunggu.';
                break;
            case 'Sagittarius':
                $kesehatan = 'Perhatikan kesehatan mental Anda, hindari stres berlebihan.';
                $asmara = 'Asmara sedang dalam masa romantis, nikmati momen ini.';
                $keuangan = 'Keuangan Anda baik, ada pemasukan tambahan.';
                $karier = 'Karier Anda berjalan lancar, ada kesempatan untuk proyek besar.';
                break;
            case 'Capricorn':
                $kesehatan = 'Kesehatan Anda prima, teruskan gaya hidup sehat.';
                $asmara = 'Hubungan asmara Anda stabil, penuh pengertian.';
                $keuangan = 'Keuangan Anda sangat baik, pertimbangkan investasi jangka panjang.';
                $karier = 'Karier Anda sedang menanjak, ada peluang besar di depan mata.';
                break;
            case 'Aquarius':
                $kesehatan = 'Jaga pola makan dan rajin berolahraga.';
                $asmara = 'Asmara Anda penuh kejutan, nikmati setiap momennya.';
                $keuangan = 'Keuangan Anda stabil, namun tetap perlu bijak dalam pengeluaran.';
                $karier = 'Karier Anda berkembang, ada peluang baru menanti.';
                break;
            case 'Pisces':
                $kesehatan = 'Perhatikan kesehatan mental Anda, luangkan waktu untuk relaksasi.';
                $asmara = 'Asmara Anda sedang dalam masa tenang, nikmati
                kebersamaan.';
                $keuangan = 'Keuangan Anda stabil, ada peluang untuk menabung lebih banyak.';
                $karier = 'Karier Anda berjalan lancar, ada kesempatan untuk proyek baru.';
                break;
            default:
                $kesehatan = 'Data tidak valid.';
                $asmara = 'Data tidak valid.';
                $keuangan = 'Data tidak valid.';
                $karier = 'Data tidak valid.';
        }

        // Menampilkan hasil
        echo "<div class='result'>";
        echo "<p>Zodiak: <strong>$zodiak</strong></p>";
        echo "<p>Kesehatan: $kesehatan</p>";
        echo "<p>Asmara: $asmara</p>";
        echo "<p>Keuangan: $keuangan</p>";
        echo "<p>Karier: $karier</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
