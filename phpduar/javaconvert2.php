<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Pembelian Barang</title>
    <style>
        .result {
            padding: 10px;
            margin-top: 10px;
            font-family: myFont;
        }
        @font-face {
            font-family: myFont;
            src: url(../image/ROGLyonsTypeRegular3.ttf);
        }
        .result input {
            margin: 5px 0;
            width: 250px;
            height: 25px;
            font-size: 15px;
            border-top-left-radius: 15%;
            border-bottom-right-radius: 15%;
        }
        .discount {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 15px;
        }
        .form {
            background-image: url(../image/backimg-mobile.jpg);
            background-size: cover;
            background-position: center;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 800px;
            height: 630px;
            color: #fff;
            display: grid;
            place-content: center;
            box-shadow: 10px 10px 10px rgb(49, 46, 46);
            font-family: myFont;
        }
        button {
            border-radius: 30px;
            width: 120px;
            height: 25px;
            font-weight: bold;
            cursor: pointer;
            background-color: gray;
            color: #fff;
        }
        #purchaseForm input {
            width: 250px;
            height: 25px;
            font-size: 20px;
            border-top-left-radius: 15%;
            border-bottom-right-radius: 15%;
        }
    </style>
</head>
<body>
<div class="discount">
    <div class="form">
        <h2>Form Pembelian Barang</h2>
        <form id="purchaseForm" method="post">
            <label for="Nama">Nama Barang:</label>
            <input type="text" id="Nama" name="Nama" required><br><br>

            <label for="Harga">Harga Barang:</label>
            <input type="number" id="Harga" name="Harga" required><br><br>

            <label for="Jumlah">Jumlah Barang:</label>
            <input type="number" id="Jumlah" name="Jumlah" required><br><br>

            <button type="submit" name="submit">Hitung Total</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Nama = $_POST['Nama'];
            $Harga = $_POST['Harga'];
            $Jumlah = $_POST['Jumlah'];
            $discount = 0;

            if ($Jumlah >= 3) {
                $discount = 0.1 * $Harga * $Jumlah;
            }

            $total = ($Harga * $Jumlah) - $discount;
        ?>
        <h2>Hasil Pembelian</h2>
        <div id="result" class="result">
            <label>Nama Barang :</label>
            <input type='text' id="resultNama" readonly value="<?php echo $Nama; ?>"><br />
            <label>Harga Barang :</label>
            <input type='text' id="resultHarga" readonly value="<?php echo $Harga; ?>"><br />
            <label>Jumlah :</label>
            <input type='text' id="resultJumlah" readonly value="<?php echo $Jumlah; ?>"><br />
            <label>Diskon :</label>
            <input type='text' id="resultDiskon" readonly value="<?php echo number_format($discount, 2); ?>"><br />
            <label>Total Bayar :</label>
            <input type='text' id="resultTotal" readonly value="<?php echo number_format($total, 2); ?>"><br />
        </div>
        <?php } else { ?>
        <h2>Hasil Pembelian</h2>
        <div id="result" class="result">
            <label>Nama Barang :</label>
            <input type='text' id="resultNama" readonly><br />
            <label>Harga Barang :</label>
            <input type='text' id="resultHarga" readonly><br />
            <label>Jumlah :</label>
            <input type='text' id="resultJumlah" readonly><br />
            <label>Diskon :</label>
            <input type='text' id="resultDiskon" readonly><br />
            <label>Total Bayar :</label>
            <input type='text' id="resultTotal" readonly><br />
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>