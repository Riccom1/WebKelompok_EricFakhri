<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Program Pegawai</title>
    <style>
        .format {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: myFont;
        }
        @font-face {
            font-family: myFont;
            src: url(../image/ROGLyonsTypeRegular3.ttf);
        }
        .format h1 {
            font-size: 15px;
            text-align: center;
        }
        form {
            background-image: url(../image/backimg-mobile.jpg);
            background-size: cover;
            background-position: center;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 700px;
            height: 600px;
            color: #fff;
            display: grid;
            place-content: center;
            padding: 20px;
            font-size: 15px;
            box-shadow: 10px 10px 10px rgb(49, 46, 46);
        }
        button {
            width: 150px;
            height: 35px;
            border-radius: 30px;
            font-size: 15px;
            cursor: pointer;
            background-color: gray;
            color: #fff;
        }
        input {
            width: 300px;
            height: 25px;
            font-size: 15px;
            border-top-left-radius: 20%;
            border-bottom-right-radius: 20%;
        }
        select {
            width: 200px;
            height: 25px;
        }
        #hasil {
            width: 350px;
            height: 30px;
        }

    </style>
</head>
<body>
    <div class="format">
    <form method="post">
        <h1>Form Penerimaan Program Pegawai</h1>
        <label for="jk">Jenis Kelamin:</label><br />
        <select id="jk" name="jk" required>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br />

        <label for="tinggi">Tinggi Badan (cm):</label><br />
        <input type="number" id="tinggi" name="tinggi" min="0" required><br />

        <label for="bb">Berat Badan (kg):</label><br />
        <input type="number" id="bb" name="bb" min="0" required><br />

        <label for="ipk">IPK:</label><br />
        <input type="number" step="0.01" id="ipk" name="ipk" min="0" max="4" required><br />

        <label for="pendidikan">Pendidikan:</label><br />
        <select id="pendidikan" name="pendidikan" required>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
        </select><br />

        <button type="submit" name="submit">Periksa Kriteria</button><br />
        <input type="text" id="hasil" readonly><br />
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jk = $_POST['jk'];
    $tinggi = $_POST['tinggi'];
    $bb = $_POST['bb'];
    $ipk = $_POST['ipk'];
    $pendidikan = $_POST['pendidikan'];
    $hasil = "";
    $bbIdeal = $tinggi - 110;

    if (($jk === "laki-laki" && $tinggi >= 170 && $tinggi <= 179 && $bb === $bbIdeal && $ipk >= 3 && $ipk <= 4 && ($pendidikan === "D3" || $pendidikan === "S1")) ||
        ($jk === "perempuan" && $tinggi >= 160 && $tinggi <= 170 && $bb === $bbIdeal && $ipk >= 3 && $ipk <= 4 && ($pendidikan === "D3" || $pendidikan === "S1"))) {
        $hasil = "Selamat, Anda memenuhi kriteria. ";
    } else {
        $hasil = "Maaf, Anda tidak memenuhi kriteria.";
    }

    echo "<script>
            document.getElementById('hasil').value = '" . $hasil . "';
          </script>";
}
?>
</body>
</html>