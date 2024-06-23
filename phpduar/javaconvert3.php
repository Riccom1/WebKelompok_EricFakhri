<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perhitungan Gaji</title>
    <style>
        .work {
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
        form {
            background-image: url(../image/backimg-mobile.jpg);
            background-size: cover;
            background-position: center;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            width: 700px;
            height: 600px;
            padding: 20px;
            color: #fff;
            display: grid;
            place-content: center;
            text-align: center;
            font-size: 18px;
            box-shadow: 10px 10px 10px rgb(49, 46, 46);
        }
        form label {
            margin-bottom: 5px;
        }
        form input {
            width: 360px;
            height: 25px;
            font-size: 18px;
            border-top-left-radius: 20%;
            border-bottom-right-radius: 20%;
        }
        button {
            border-radius: 20px;
            width: 120px;
            font-weight: bold;
            cursor: pointer;
            background-color: gray;
            color: #fff;
        }
    </style>
</head>
<body>
    <script type="text/javascript">
        function calculateSalary() {
            const daysWorked = parseInt(document.getElementById("daysWorked").value) || 0;
            const hoursWorked = parseInt(document.getElementById("hoursWorked").value) || 0;
            const overtimeHours = parseInt(document.getElementById("overtimeHours").value) || 0;
            const gajiPerHari = 50000;
            const gajiPerJam = gajiPerHari / 8;

            let overtimeRate = 0;
            if (overtimeHours >= 3) {
                overtimeRate = 35000;
            } else if (overtimeHours > 0) {
                overtimeRate = 25000;
            }

            const totalOvertime = overtimeRate * overtimeHours;
            const basicSalary = gajiPerHari * daysWorked + gajiPerJam * hoursWorked;
            let mealAllowance = 0;

            if (daysWorked >= 20) {
                mealAllowance = 5000 * daysWorked;
            }

            const totalSalary = basicSalary + totalOvertime + mealAllowance;

            document.getElementById("basicSalaryOutput").value = `Rp${basicSalary.toFixed(2)}`;
            document.getElementById("overtimePayOutput").value = `Rp${totalOvertime.toFixed(2)}`;
            document.getElementById("mealAllowanceOutput").value = `Rp${mealAllowance.toFixed(2)}`;
            document.getElementById("totalSalary").value = `Rp${totalSalary.toFixed(2)}`;
        }
    </script>

<div class="work">
    <form method="post">
        <label for="daysWorked">Jumlah Hari Bekerja:</label>
        <input type="number" id="daysWorked" name="daysWorked" required /><br />

        <label for="hoursWorked">Jumlah Jam Kerja:</label>
        <input type="number" id="hoursWorked" name="hoursWorked" required /><br />

        <label for="overtimeHours">Jumlah Jam Lembur:</label>
        <input type="number" id="overtimeHours" name="overtimeHours" required /><br />

        <button type="submit" name="submit">Hitung Gaji</button>

        <label>Gaji Pokok:</label>
        <input type="text" id="basicSalaryOutput" readonly /><br />

        <label>Uang Lembur:</label>
        <input type="text" id="overtimePayOutput" readonly /><br />

        <label>Uang Makan:</label>
        <input type="text" id="mealAllowanceOutput" readonly /><br />

        <label>Total Gaji:</label>
        <input type="text" id="totalSalary" readonly /><br />
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $daysWorked = $_POST['daysWorked'];
    $hoursWorked = $_POST['hoursWorked'];
    $overtimeHours = $_POST['overtimeHours'];
    $gajiPerHari = 50000;
    $gajiPerJam = $gajiPerHari / 8;

    $overtimeRate = 0;
    if ($overtimeHours >= 3) {
        $overtimeRate = 35000;
    } elseif ($overtimeHours > 0) {
        $overtimeRate = 25000;
    }

    $totalOvertime = $overtimeRate * $overtimeHours;
    $basicSalary = $gajiPerHari * $daysWorked + $gajiPerJam * $hoursWorked;
    $mealAllowance = 0;

    if ($daysWorked >= 20) {
        $mealAllowance = 5000 * $daysWorked;
    }

    $totalSalary = $basicSalary + $totalOvertime + $mealAllowance;

    echo "<script>
            document.getElementById('basicSalaryOutput').value = 'Rp' + " . $basicSalary . ".toFixed(2);
            document.getElementById('overtimePayOutput').value = 'Rp' + " . $totalOvertime . ".toFixed(2);
            document.getElementById('mealAllowanceOutput').value = 'Rp' + " . $mealAllowance . ".toFixed(2);
            document.getElementById('totalSalary').value = 'Rp' + " . $totalSalary . ".toFixed(2);
          </script>";
}
?>
</body>
</html>