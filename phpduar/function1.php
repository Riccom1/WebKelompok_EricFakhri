<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konversi Nilai</title>
<style>
    .convert {
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
    #formKonversi {
        background-image: url(../image/backimg-mobile.jpg);
        background-size: cover;
        background-position: center;
        border-top-left-radius:  50%;
        border-bottom-right-radius: 50%;
        display: grid;
        place-content: center;
        width: 500px;
        height: 450px;
        color: #fff;
        font-size: 25px;
        box-shadow: 10px 10px 10px rgb(49, 46, 46);
    }
    button {
        width: 90px;
        height: 35px;
        border-radius: 30px;
        cursor: pointer;
        background-color: gray;
        color: #fff;
    }
    input {
        width: 200px;
        height: 35px;
        font-size: 20px;       
        border-top-left-radius:  15%;
        border-bottom-right-radius: 15%;
    }
</style>
</head>
<body>
<div class="convert">
    <form id="formKonversi" method="post">
        <label for="nilai">Masukkan Nilai :</label><br>
        <input type="number" id="nilai" name="nilai"><br><br>
        <button type="submit">Konversi</button><br />
    
        <label for="hasilKonversi">Hasil Konversi :</label><br>
        <input type="text" id="hasilKonversi" name="hasilKonversi" readonly value="<?php echo isset($_POST['nilai']) ? hitungKonversi($_POST['nilai']) : ''; ?>"><br><br>
    </form>
</div>
</body>
</html>

<?php
function hitungKonversi($nilai) {
    if ($nilai >= 80 && $nilai <= 100) {
        return 'A';
    } else if ($nilai >= 70 && $nilai <= 79) {
        return 'B';
    } else if ($nilai >= 60 && $nilai <= 69) {
        return 'C';
    } else if ($nilai >= 50 && $nilai <= 59) {
        return 'D';
    } else if ($nilai < 50 && $nilai >= 0) {
        return 'E';
    } else {
        return 'Nilai tidak valid';
    }
}
?>