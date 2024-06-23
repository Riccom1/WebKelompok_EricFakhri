<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat Penerimaan Pegawai</title>
    <style>
        form { margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"], select { margin-top: 5px; width: 200px; }
        button { margin-top: 10px; }
        .result { margin-top: 20px; font-size: 1.2em; color: blue; }
    </style>
</head>
<body>
    <h1>Syarat Penerimaan Pegawai</h1>

    <?php
    // Inisialisasi variabel untuk hasil kelayakan
    $hasil = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari form
        $jenisKelamin = $_POST['jenisKelamin'];
        $tinggiBadan = intval($_POST['tinggiBadan']);
        $beratBadan = intval($_POST['beratBadan']);
        $ipk = floatval($_POST['ipk']);
        $pendidikan = $_POST['pendidikan'];

        // Hitung berat badan ideal
        $bbIdeal = $tinggiBadan - 110;

        // Cek kelayakan berdasarkan kriteria
        $layak = false;
        if (($jenisKelamin === 'laki-laki' && $tinggiBadan >= 170 && $tinggiBadan <= 179 && $beratBadan == $bbIdeal && $ipk >= 3.0 && $ipk <= 4.0 && ($pendidikan === 'D3' || $pendidikan === 'S1')) ||
            ($jenisKelamin === 'perempuan' && $tinggiBadan >= 160 && $tinggiBadan <= 170 && $beratBadan == $bbIdeal && $ipk >= 3.0 && $ipk <= 4.0 && ($pendidikan === 'D3' || $pendidikan === 'S1'))) {
            $layak = true;
        }

        // Menentukan hasil berdasarkan kelayakan
        if ($layak) {
            $hasil = 'Selamat! Anda memenuhi syarat penerimaan pegawai.';
        } else {
            $hasil = 'Maaf, Anda tidak memenuhi syarat penerimaan pegawai.';
        }
    }
    ?>

    <form method="post" action="">
        <label for="jenisKelamin">Jenis Kelamin:</label>
        <select id="jenisKelamin" name="jenisKelamin" required>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br><br>
        
        <label for="tinggiBadan">Tinggi Badan (cm):</label>
        <input type="number" id="tinggiBadan" name="tinggiBadan" required><br><br>
        
        <label for="beratBadan">Berat Badan (kg):</label>
        <input type="number" id="beratBadan" name="beratBadan" required><br><br>
        
        <label for="ipk">IPK:</label>
        <input type="number" step="0.01" id="ipk" name="ipk" required><br><br>
        
        <label for="pendidikan">Pendidikan:</label>
        <select id="pendidikan" name="pendidikan" required>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
        </select><br><br>
        
        <button type="submit">Cek Kelayakan</button><br><br>
    </form>

    <?php
    // Tampilkan hasil kelayakan jika form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='result'><strong>Hasil:</strong> " . htmlspecialchars($hasil) . "</div>";
    }
    ?>
</body>
</html>
