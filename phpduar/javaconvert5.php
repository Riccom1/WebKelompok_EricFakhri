<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .detik {
            background-image: url(../image/backimg-mobile.jpg);
            background-size: cover;
            background-position: center;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 700px;
            height: 580px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 10px 10px 10px rgb(49, 46, 46);
            font-family: myFont;
        }
        @font-face {
            font-family: myFont;
            src: url(../image/ROGLyonsTypeRegular3.ttf);
        }
        #timeForm {
            text-align: center;
            font-size: 15px;
            margin-top: 65px;
        }
        input {
            width: 300px;
            height: 30px;
            border-top-left-radius: 20%;
            border-bottom-right-radius: 20%;
        }
        button {
            font-size: 15px;
            border-radius: 20px;
            cursor: pointer;
            background-color: gray;
            color: #fff;
            font-family: myFont;
        }
    </style>
</head>
<body>
    <div class="detik">
        <form method="post">
            <label for="secondsInput">Masukkan jumlah detik pemakaian:</label><br><br>
            <input type="number" id="secondsInput" name="secondsInput" required><br><br>
            <button type="submit" name="submit">Hitung Biaya</button><br />

            <h2>Tagihan</h2>
            <label>Total detik:</label>
            <input type='text' id='totalDetik' readonly><br><br>
            <label>Jam:</label>
            <input type='text' id='jam' readonly><br><br>
            <label>Menit:</label>
            <input type='text' id='menit' readonly><br><br>
            <label>Detik:</label>
            <input type='text' id='detik' readonly><br><br>
            <label>Total biaya:</label>
            <input type='text' id='biaya' readonly>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $secondsInput = $_POST['secondsInput'];
        $pulsa = 30 / 45;
        $biaya = $secondsInput * $pulsa;
        $jam = floor($secondsInput / 3600);
        $sisaDetikSetelahJam = $secondsInput % 3600;
        $menit = floor($sisaDetikSetelahJam / 60);
        $sisaDetikAkhir = $sisaDetikSetelahJam % 60;
    ?>
    <script>
        document.getElementById('totalDetik').value = '<?php echo $secondsInput; ?>' + ' detik';
        document.getElementById('jam').value = '<?php echo $jam; ?>' + ' jam';
        document.getElementById('menit').value = '<?php echo $menit; ?>' + ' menit';
        document.getElementById('detik').value = '<?php echo $sisaDetikAkhir; ?>' + ' detik';
        document.getElementById('biaya').value = 'Rp <?php echo number_format($biaya, 2); ?>';
    </script>
    <?php } ?>
</body>
</html>